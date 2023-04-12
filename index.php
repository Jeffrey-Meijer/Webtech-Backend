<?php

require './vendor/autoload.php';

use Webtech\Controllers\AdminController;
use Webtech\Controllers\AuthController;
use Webtech\Controllers\ExamsController;
use Webtech\Controllers\GradesController;
use Webtech\Controllers\IndexController;
use Webtech\Controllers\TeacherController;
use Webtech\Controllers\UsersController;
use Webtech\Http\TemplateLoader;
use Webtech\Middleware\AuthMiddleware;
use Webtech\Models\AdminModel;
use Webtech\Models\ExamsModel;
use Webtech\Models\GradesModel;
use Webtech\Models\IndexModel;
use Webtech\Models\LoginModel;
use Webtech\Models\RegisterModel;
use Webtech\Models\TeacherModel;
use Webtech\Models\UsersModel;
use Webtech\Request\Request;
use Webtech\Request\RequestHandler;
use Webtech\Route\RouteFactory;

/**
 * @throws Exception
 */
function onRequest($event): void
{
    $found = false;
    $path = $event->getRequest()->getUri()->getPath();
    $method = $event->getRequest()->getMethod();
    $routeFactory = new RouteFactory();
    $templateLoader = new TemplateLoader("./app/Views", "./app/Public/css");
    $routeFactory->createRoute(
        "home",
        "GET",
        "/",
        new IndexController("view", new IndexModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "users",
        "GET",
        "/users",
        new UsersController("view", new UsersModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "grades",
        "GET",
        "/grades",
        new GradesController("view", new GradesModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "exams",
        "GET",
        "/exams",
        new ExamsController("view", new ExamsModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "availableExams",
        "GET",
        "/exams/available",
        new ExamsController("available", new ExamsModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "handleExam",
        "POST",
        "/exams",
        new ExamsController("handle", new ExamsModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "handleExam",
        "POST",
        "/exams/available",
        new ExamsController("handle", new ExamsModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "login",
        "GET",
        "/login",
        new AuthController("view", new LoginModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "handleLogin",
        "POST",
        "/login",
        new AuthController("handleLogin", new LoginModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "logout",
        "GET",
        "/logout",
        new AuthController("logout", new LoginModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "register",
        "GET",
        "/register",
        new AuthController("registerView", new RegisterModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "handleRegister",
        "POST",
        "/register",
        new AuthController("handleRegister", new RegisterModel(), $templateLoader, $event)
    );

    // Admin tool routes
    $routeFactory->createRoute(
        "adminTools",
        "GET",
        "/admin",
        new AdminController("view", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsUsers",
        "GET",
        "/admin/users",
        new AdminController("viewUsers", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsExams",
        "GET",
        "/admin/exams",
        new AdminController("viewExams", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsEditUser",
        "GET",
        "/admin/users/edit",
        new AdminController("viewUserEdit", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsUpdateUser",
        "POST",
        "/admin/users/edit",
        new AdminController("userUpdate", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsCreateUser",
        "GET",
        "/admin/users/create",
        new AdminController("viewUserCreate", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsInsertUser",
        "POST",
        "/admin/users/create",
        new AdminController("userInsert", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsDeleteUser",
        "POST",
        "/admin/users/delete",
        new AdminController("userDelete", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsCreateExamView",
        "GET",
        "/admin/exams/create",
        new AdminController("viewExamCreate", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsInsertExam",
        "POST",
        "/admin/exams/create",
        new AdminController("examInsert", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsUpdateExamView",
        "GET",
        "/admin/exams/edit",
        new AdminController("viewExamEdit", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsUpdateExam",
        "POST",
        "/admin/exams/edit",
        new AdminController("examUpdate", new AdminModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "adminToolsDeleteExam",
        "POST",
        "/admin/exams/delete",
        new AdminController("examDelete", new AdminModel(), $templateLoader, $event)
    );

    // Teacher tool routes
    $routeFactory->createRoute(
        "teacherTools",
        "GET",
        "/teacher",
        new TeacherController("view", new TeacherModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "teacherToolsExams",
        "GET",
        "/teacher/exams",
        new TeacherController("viewExams", new TeacherModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "teacherToolsExamResults",
        "POST",
        "/teacher/exams/results",
        new TeacherController("viewExamResults", new TeacherModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "teacherToolsExamsEditResult",
        "GET",
        "/teacher/exams/results/edit",
        new TeacherController("viewExamResultEdit", new TeacherModel(), $templateLoader, $event)
    );
    $routeFactory->createRoute(
        "teacherToolsExamsHandleEdit",
        "POST",
        "/teacher/exams/results/edit",
        new TeacherController("examResultUpdate", new TeacherModel(), $templateLoader, $event)
    );

    $routes = $routeFactory->getRoutes();
    $event->getRequest()->attributes->set('routes', $routes);
    foreach ($routes as $route) {
        if ($route->getPath() == $path && $route->getMethod() == $method) {
            $found = true;
            $route->getController()->invoke();
            break;
        }
    }
    if (!$found) {
        $templateLoader->load("404");
    }
}

$request = Request::fromGlobals();
$requestHandler = new RequestHandler();
$middleware = new AuthMiddleware();

$middleware->process($request, $requestHandler);



