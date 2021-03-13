@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulario') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->rol != 'admin')
                    <form method="POST" action="{{ route('home') }}">
                        @csrf
                        <div class="form-group">
                          <label for="textArea">¿Qué te gustaría que agregáramos al informe?</label>
                          <textarea class="form-control" id="textArea" rows="3" name="q1"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">¿La información es correcta?</label>
                          <div>
                            <div class="field form-inline radio">
                                <input class="radio" type="radio" name="q2" value="SI" checked /> <span> SI</span>
                                <input class="radio" type="radio" name="q2" value="NO" /> <span> NO</span>
                                <input class="radio" type="radio" name="q2" value="Más o Menos" /> <span>Más o Menos</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect2">¿Del 1 al 5, es rápido el sitio?”</label>
                          <div>
                            <div class="field form-inline radio">
                                <input class="radio" type="radio" name="q3" value="1" checked /> <span> 1</span>
                                <input class="radio" type="radio" name="q3" value="2" /> <span> 2</span>
                                <input class="radio" type="radio" name="q3" value="3" /> <span>3</span>
                                <input class="radio" type="radio" name="q3" value="4" /> <span>4</span>
                                <input class="radio" type="radio" name="q3" value="5" /> <span>5</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <button>Enviar</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
