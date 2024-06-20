@extends('layouts.app1')

@section('content')
    <h3>メモ - {{ $date }}</h3>
    <form method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="memo" rows="5">{{ old('memo', $memo->memo) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
@endsection

