@extends('layouts.layout')

@section('content')
    <div class="container">
        <h3><a href="?ym=<?php echo $data['prev']; ?>">&lt;</a> <?php echo $data['html_title']; ?> <a href="?ym=<?php echo $data['next']; ?>">&gt;</a></h3>
        <table class="table table-bordered">
            <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
            </tr>
            <?php
            foreach ($data['weeks'] as $week) {
                echo $week;
            }
            ?>
        </table>
@endsection


