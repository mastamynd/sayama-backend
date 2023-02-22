@extends('layouts.app')
@section('title')
<title>Landing Page</title>
<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<style>
    .containerz {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        justify-items: center;
        max-width: 800px;
        margin: auto;
        width: 100%;
        height: 85vh;
        padding: 20px;
        box-sizing: border-box;
    }

    a.item {
        cursor: pointer;
        display: flex;
        text-decoration: none;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        margin: 10px;
        min-width: 130px;
        background-color: #fff;
        border: 1px solid #fefefa;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
        transition: transform .2s;
    }

    .item:hover {
        transform: scale(1.2);
        box-shadow: 0 2px 4px rgba(142, 58, 2, 0.3);
    }

    .item i {
        font-size: 2em;
        margin-bottom: 10px;
    }

    .item h3 {
        font-size: 0.9em;
        text-shadow: #000;
        color:#050505;
        margin: 0;
        text-align: center;
    }
</style>
@endsection
@section('content')
<div class="containerz">
    <a class="item" href="{{ route('members.index') }}">
        <i class="fas fa-users text-primary"></i>
        <h3>MEMBERS</h3>
    </a>
    <a class="item" href="{{ route('transactions.index') }}">
        <i class="fas fa-money-bill text-success"></i>
        <h3>TRANSACTIONS</h3>
    </a>
    <a class="item" href="{{ route('users.index') }}">
        <i class="fas fa-user-friends text-info"></i>
        <h3>USERS</h3>
    </a>
</div>
@endsection