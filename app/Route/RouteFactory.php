<?php

namespace Webtech\Route;


use Webtech\Controllers\AdminController;
use Webtech\Controllers\AuthController;
use Webtech\Controllers\ExamsController;
use Webtech\Controllers\GradesController;
use Webtech\Controllers\IndexController;
use Webtech\Controllers\TeacherController;
use Webtech\Controllers\UsersController;
use Webtech\Http\ControllerInterface;
use Webtech\Http\RouteFactoryInterface;
use Webtech\Models\AdminModel;
use Webtech\Models\ExamsModel;
use Webtech\Models\GradesModel;
use Webtech\Models\IndexModel;
use Webtech\Models\LoginModel;
use Webtech\Models\RegisterModel;
use Webtech\Models\TeacherModel;
use Webtech\Models\UsersModel;

class RouteFactory implements RouteFactoryInterface
{
    private array $routes = array();

    public function createRoute(string $name, string $method, string $path, ControllerInterface $controller): array
    {
        $this->routes[] = new Route($name, $method, $path, $controller);

        return $this->routes;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function createAllRoutes($templateLoader, $event)
    {
        $this->createRoute(
            "home",
            "GET",
            "/",
            new IndexController("view", new IndexModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "users",
            "GET",
            "/users",
            new UsersController("view", new UsersModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "grades",
            "GET",
            "/grades",
            new GradesController("view", new GradesModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "exams",
            "GET",
            "/exams",
            new ExamsController("view", new ExamsModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "availableExams",
            "GET",
            "/exams/available",
            new ExamsController("available", new ExamsModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "handleExam",
            "POST",
            "/exams",
            new ExamsController("handle", new ExamsModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "handleExam",
            "POST",
            "/exams/available",
            new ExamsController("handle", new ExamsModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "login",
            "GET",
            "/login",
            new AuthController("view", new LoginModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "handleLogin",
            "POST",
            "/login",
            new AuthController("handleLogin", new LoginModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "logout",
            "GET",
            "/logout",
            new AuthController("logout", new LoginModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "register",
            "GET",
            "/register",
            new AuthController("registerView", new RegisterModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "handleRegister",
            "POST",
            "/register",
            new AuthController("handleRegister", new RegisterModel(), $templateLoader, $event)
        );

        // Admin tool routes
        $this->createRoute(
            "adminTools",
            "GET",
            "/admin",
            new AdminController("view", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsUsers",
            "GET",
            "/admin/users",
            new AdminController("viewUsers", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsExams",
            "GET",
            "/admin/exams",
            new AdminController("viewExams", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsEditUser",
            "GET",
            "/admin/users/edit",
            new AdminController("viewUserEdit", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsUpdateUser",
            "POST",
            "/admin/users/edit",
            new AdminController("userUpdate", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsCreateUser",
            "GET",
            "/admin/users/create",
            new AdminController("viewUserCreate", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsInsertUser",
            "POST",
            "/admin/users/create",
            new AdminController("userInsert", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsDeleteUser",
            "POST",
            "/admin/users/delete",
            new AdminController("userDelete", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsCreateExamView",
            "GET",
            "/admin/exams/create",
            new AdminController("viewExamCreate", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsInsertExam",
            "POST",
            "/admin/exams/create",
            new AdminController("examInsert", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsUpdateExamView",
            "GET",
            "/admin/exams/edit",
            new AdminController("viewExamEdit", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsUpdateExam",
            "POST",
            "/admin/exams/edit",
            new AdminController("examUpdate", new AdminModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "adminToolsDeleteExam",
            "POST",
            "/admin/exams/delete",
            new AdminController("examDelete", new AdminModel(), $templateLoader, $event)
        );

        // Teacher tool routes
        $this->createRoute(
            "teacherTools",
            "GET",
            "/teacher",
            new TeacherController("view", new TeacherModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "teacherToolsExams",
            "GET",
            "/teacher/exams",
            new TeacherController("viewExams", new TeacherModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "teacherToolsExamResults",
            "GET",
            "/teacher/exams/results",
            new TeacherController("viewExamResults", new TeacherModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "teacherToolsExamsEditResult",
            "GET",
            "/teacher/exams/results/edit",
            new TeacherController("viewExamResultEdit", new TeacherModel(), $templateLoader, $event)
        );
        $this->createRoute(
            "teacherToolsExamsHandleEdit",
            "POST",
            "/teacher/exams/results/edit",
            new TeacherController("examResultUpdate", new TeacherModel(), $templateLoader, $event)
        );
    }
}
