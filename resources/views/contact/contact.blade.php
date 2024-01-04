@extends('layouts.appLanding')

@section('activeContact')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="Address">
                    <address>
                        <label class="h3">PCHARD S.A.C.</label><br>
                        Lima, Perú<br>
                        Pachacamac, CA 15594<br>
                        <abbr title="Phone">P:</abbr> (51) 957686487
                    </address>

                    <address>
                        <strong>Atencion al Cliente</strong><br>
                        <a href="mailto:#">atencionalcliente@pc-hard.com</a>
                        <br><br>

                        <strong>Ventas</strong><br>
                        <a href="mailto:#">ventas@pc-hard.com</a>
                    </address>
                </div>
            </div>
            <div class="col-sm-8">
                <div id="GoMap"></div>
            </div>
        </div>
        <br>
    </div>

    <div class="gray">
        <div class="container align-center">
            <h1> ¿Necesitas nuestra ayuda? </h1>
            <p> Primero seleccione una de las preguntas anteriores para que podamos conectarlo  <br class="visible-md visible-lg"> con el agente adecuado. </p>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form class="contact" action="#" method="post">
                        @csrf
                        <textarea class="form-control" name="message" placeholder="Mensaje" required="" rows="5"></textarea>
                        <br>

                        <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                        <br>

                        <button type="submit" class="btn btn-primary justify"> Send question <i class="ion-android-send"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
@endsection
