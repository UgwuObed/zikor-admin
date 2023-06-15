@extends('layouts.app')

<h1> Welcome <h1>

	<a href="{{ route('profile.show') }}">Profile</a>
	<a href="{{ route('clothes.create') }}">Add New Clothes</a>
	<a href="{{ route('shoes.create') }}">Add New Shoes</a>
	<a href="{{ route('food.create') }}">Add New Food</a>


