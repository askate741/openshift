<?php
{{ Form::open( array(
'route' => 'settings.create',
'method' => 'get',
'id' => 'form-add-setting'
) ) }}

{{ Form::label( 'setting_name', 'Setting Name:' ) }}
{{ Form::text( 'setting_name', '', array(
    'id' => 'setting_name',
    'placeholder' => 'Enter Setting Name',
    'maxlength' => 20,
    'required' => true,
) ) }}
{{ Form::label( 'setting_value', 'Setting Value:' ) }}
{{ Form::text( 'setting_value', '', array(
    'id' => 'setting_value',
    'placeholder' => 'Enter Setting Value',
    'maxlength' => 30,
    'required' => true,
) ) }}

{{ Form::submit( 'Add Setting', array(
    'id' => 'btn-add-setting',
) ) }}

{{ Form::close() }}
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2017/1/10
 * Time: 下午 02:46
 */