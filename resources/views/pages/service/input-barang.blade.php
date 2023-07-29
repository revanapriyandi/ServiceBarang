@php
    $dataTemporary = session('data_temporary', []);
    $lastIdOrder = $dataTemporary ? end($dataTemporary)['id_order'] : '';
    $lastTeknisi = $dataTemporary ? end($dataTemporary)['teknisi'] : '';
    $lastBarang = $dataTemporary ? end($dataTemporary)['barang'] : '';
    $point = 0;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('pages.service.inputBarang', ['lastIdOrder' => $lastIdOrder])
        @include('pages.service.table', [
            'dataTemporary' => $dataTemporary,
            'point' => $point,
        ])
    </div>
@endsection
@push('modal')
    @include('pages.service.modal')
@endpush
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@push('scripts')
    @include('pages.service.script-input', ['teknisis' => $teknisi, 'barangs' => $barang])
@endpush
