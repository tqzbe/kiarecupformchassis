<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cuprum" type="text/css" media="all">
        <link rel="stylesheet" href="/css/app.css">

        <title>Kia récup</title>
    </head>
    
    <body>

        <div id="app">

            <header id="main-header">
            
                <img id="logo" src="/img/logo.jpg" alt="Logo Kia récup">
            
            </header>

            <div id="form-chassis">

                @if(session('success'))
                    <span class="success">{{session('success')}}</span>
                @endif

                @if(session('error'))
                    <span class="error">{{session('error')}}</span>
                @endif

                <form action="{{ route('form.send') }}" method="POST">

                    @csrf

                    <div class="form-group @error('lastname') is-invalid @enderror">
                        <label for="lastname">Nom *</label>

                        <div class="container-fields">
                            <input name="lastname" id="lastname" type="text" placeholder="Votre nom" value="{{ old('lastname') }}">

                            @error('lastname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="form-group @error('firstname') is-invalid @enderror">
                        <label for="firstname">Prénom *</label>

                        <div class="container-fields">
                            <input name="firstname" id="firstname" type="text" placeholder="Votre prénom" value="{{ old('firstname') }}">

                            @error('firstname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="form-group @error('email') is-invalid @enderror">
                        <label for="email">Email *</label>

                        <div class="container-fields">
                            <input name="email" id="email" type="email" placeholder="Votre adresse email" value="{{ old('email') }}">

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="phone">Numéro de téléphone</label>
                        <div class="container-fields">
                            <input name="phone" id="phone" type="phone" placeholder="Votre numéro de téléphone" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="chassis_number">Numéro châssis</label>
                        <div class="container-fields">
                            <input name="chassis_number" id="chassis_number" type="phone" placeholder="Numéro châssis" value="{{ old('chassis_number') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="piece_reference">Référence pièce</label>
                        <div class="container-fields">
                            <input name="piece_reference" id="piece_reference" type="phone" placeholder="Référence pièce" value="{{ old('piece_reference') }}">
                        </div>
                    </div>

                    <div class="form-group textarea">
                        <label for="message">Message</label>
                        <div class="container-fields">
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Ecrivez votre message">{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group textarea">
                        <label>Photos</label>
                        <div class="container-fields">
                            <file-uploader></file-uploader>
                        </div>
                    </div>

                    <button type="submit" id="btnFormSubmit">Envoyer</button>

                </form>

            </div>
        
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
