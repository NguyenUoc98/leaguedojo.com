@extends('errors::layout')

@section('title', __('ERROR'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
