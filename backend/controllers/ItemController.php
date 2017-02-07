<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2017/2/7
 * Time: 11:14
 */

namespace backend\controllers;


use yii\web\Controller;

class ItemController extends Controller
{
    private $pro_projectname = [];
    private $course_list = [];
    private $person_list = [];
    private $pro_school = [];
    private $teacher_list = [];

    public function actionTest() {
        echo 'test';exit;
    }

    public function actionIndex() {
        echo 'this is index';
    }

}