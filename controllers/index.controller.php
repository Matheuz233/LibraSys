<?php

$db = new DB();

$livros = $db->livros();

view('index', ['livros' => $livros]);
