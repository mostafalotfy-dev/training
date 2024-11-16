<?php


// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;




Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {

    $trail->push(__("Roles"), route('roles.index'));
});
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail,$role) {
    $trail->parent("roles.index");
    $trail->push(__("Roles"), route('roles.edit',$role));
});
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent("roles.index");
    $trail->push(__("Create Roles "), route('roles.create'));
});
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("roles.index");
    $trail->push(__("Show Roles "), route('roles.show',$id));
});
Breadcrumbs::for('admins.index', function (BreadcrumbTrail $trail) {

    $trail->push(__("Instructor"), route('admins.index'));
});

Breadcrumbs::for('admins.create', function (BreadcrumbTrail $trail) {
    $trail->parent("admins.index");
    $trail->push(__("Create Instructor"), route('admins.create'));
});
Breadcrumbs::for('admins.edit', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("admins.index");
    $trail->push(__("Edit Instructor"), route('admins.edit',$id));
});
Breadcrumbs::for('admins.show', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("admins.index");

    $trail->push(__("Show Instructor"), route('admins.show',$id));
});
/*---------------------------------------------------------------------------*/

Breadcrumbs::for('trainers.index', function (BreadcrumbTrail $trail) {

    $trail->push(__("Trainers"), route('trainers.create'));
});

Breadcrumbs::for('trainers.create', function (BreadcrumbTrail $trail) {
    $trail->parent("trainers.index");
    $trail->push(__("Create Trainers"), route('trainers.create'));
});
Breadcrumbs::for('trainers.edit', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("trainers.index");
    $trail->push(__("Edit Trainers"), route('trainers.edit',$id));
});
Breadcrumbs::for('trainers.show', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("trainers.index");

    $trail->push(__("Show Trainers"), route('trainers.show',$id));
});
/*--------------------------------------------------*/
Breadcrumbs::for('courses.index', function (BreadcrumbTrail $trail) {

    $trail->push(__("Courses"), route('courses.create'));
});

Breadcrumbs::for('courses.create', function (BreadcrumbTrail $trail) {
    $trail->parent("courses.index");
    $trail->push(__("Create Courses"), route('courses.create'));
});
Breadcrumbs::for('courses.edit', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("courses.index");
    $trail->push(__("Edit Courses"), route('courses.edit',$id));
});
Breadcrumbs::for('courses.show', function (BreadcrumbTrail $trail,$id) {
    $trail->parent("courses.index");

    $trail->push(__("Show Course"), route('courses.show',$id));
});
Breadcrumbs::for('courses.my', function (BreadcrumbTrail $trail) {
    $trail->parent("courses.index");
    $trail->push(__("My Courses"), route('courses.my'));
});
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {


    $trail->push(__("Dashboard"), route('dashboard'));
});
