<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

interface iUploadImageManage
{
    public function uploadImage(Request $request);
}