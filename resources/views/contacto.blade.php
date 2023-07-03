@extends('layouts/main')

@section('title', 'Contacto WebExpert')

@section('main')
<section>
    <h1 class="fs-1 text-center mt-3 text-white">Formulario de contacto</h1>
    <div class="w-100">
        <form action="mailto:webexpert@gmail.com" class="d-flex flex-column p-2 my-3 container mx-auto formulario">
            <div class="d-flex flex-column mb-3">
                <label for="nombre" class="mt-3 mb-2 fw-bold fs-3">Nombre y apellido:</label>
                <input type="text" name="nombre" id="nombre"> 
            </div>

            <div class="d-flex flex-column mb-3">
                <label for="email" class="mt-3 mb-2 fw-bold fs-3">Correo electrónico:</label>
                <input type="text" name="email" id="email">
            </div>

            <div class="d-flex flex-column mb-3">
                <label for="numero" class="mt-3 mb-2 fw-bold fs-3">Número telefónico:</label>
                <input type="text" name="numero" id="numero">
            </div>

            <div class="d-flex flex-column mb-3">
                <label for="mensaje" class="mt-3 mb-2 fw-bold fs-3">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" name="enviar" id="enviar" class="w-50 mx-auto my-3 fs-5 text-center text-white botonVioleta">Enviar</button>
        </form>
    </div>

    <aside>
        <p class="textoAclaracion my-4 w-75 mx-auto bg-white">Utilizamos esta información para poder brindarle un servicio lo mas personalizado posible aparte de poder corroborar la identidad de nuestros clientes lo que nos ayuda a poder dedicarnos a contestar principalmente los mensajes que sabemos que son de clientes reales y no simplemente bots o spam. Por esa razón, agradeceríamos que la compartieras con nosotros. De igual manera, si prefiere dejar algun campo sin completar, también le contestaremos.</p>
    </aside>
</section>
@endsection