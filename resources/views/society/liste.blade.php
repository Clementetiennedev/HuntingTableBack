<!DOCTYPE html>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    a.btn {
        text-decoration: none;
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        margin-bottom: 5px;
        color: #fff;
        background-color: #007bff;
        border: 1px solid #007bff;
        border-radius: 3px;
        cursor: pointer;
    }

    a.btn-danger {
        background-color: #dc3545;
        border: 1px solid #dc3545;
    }

    a.btn:hover,
    a.btn-danger:hover {
        background-color: #0000ff;
        border: 1px solid #0000ff;
    }
    a.ajouter{
        background-color: green;
        border: 1px solid green;
    }
</style>
<div class="container">
    <h2>Liste des Sociétés</h2>
    <a href="/create/society-view" class="ajouter btn btn-sm btn-info">Ajouter</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $society)
        <tr>
            <td>{{ $society->id }}</td>
            <td>{{ $society->name }}</td>
            <td>{{ $society->description }}</td>
            <td>
                <a href="/update/society/{{ $society->id }}" class="btn btn-sm btn-info">Modifier</a>
                <a href="/delete/society/{{ $society->id }}" class="btn btn-sm btn-danger">Supprimer</a>
            </td>
        </tr>
        @endforeach
        <a href="/admin" class="btn btn-sm btn-danger">Retour au menu</a>
        </tbody>
    </table>

