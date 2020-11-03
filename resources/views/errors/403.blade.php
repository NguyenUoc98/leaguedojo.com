@extends('errors::layout')

@section('title', __('ERROR'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
