<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>
<body>
    <h1 class="text-center my-4">Criar conta</h1>

    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form action="{{ route("auth.register.store") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="user[name]" class="form-control" placeholder="Nome"
                            class="form-control {{$errors->has('user.name') ? 'is-invalid' : ''}}"
                            value="{{old('user.name')}}">
                            <div>{{$errors->first('user.name');}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" name="user[email]"
                            class="form-control {{$errors->has('user.email') ? 'is-invalid' : ''}}" placeholder="E-mail"
                            value="{{old('user.email')}}">
                            <div>{{$errors->first('user.email')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="user[cpf]"
                            class="form-control {{$errors->has('user.cpf') ? 'is-invalid' : ''}}" placeholder="CPF"
                            value="{{old('user.cpf')}}">
                            <div>{{$errors->first('user.cpf')}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" name="user[password]"
                            class="form-control {{$errors->has('user.password') ? 'is-invalid' : ''}}" placeholder="Senha">
                            <div>{{$errors->first('user.password')}}</div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" name="user[password_confirmation]"
                            class="form-control" placeholder="Confirmar Senha">
                        </div>

                    </div>
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[cep]"
                                class="form-control {{$errors->has('address.cep') ? 'is-invalid' : ''}}"
                                placeholder="CEP"
                                value="{{old('address.cep')}}"
                            >
                            <div>{{$errors->first('address.cep')}}</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[uf]"
                                class="form-control uf {{$errors->has('address.uf') ? 'is-invalid' : ''}}"
                                placeholder="UF"
                                value="{{old('address.uf')}}"
                            >
                            <div>{{$errors->first('address.uf')}}</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[city]"
                                class="form-control {{$errors->has('address.city') ? 'is-invalid' : ''}}"
                                placeholder="Cidade"
                                value="{{old('address.city')}}"
                            >
                            <div>{{$errors->first('address.city')}}</div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[street]"
                                class="form-control {{$errors->has('address.street') ? 'is-invalid' : ''}}"
                                placeholder="Logradouro"
                                value="{{old('address.street')}}"
                            >
                            <div>{{$errors->first('address.street')}}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control {{$errors->has('address.number') ? 'is-invalid' : ''}}"
                                class="form-control"
                                placeholder="Número"
                                value="{{old('address.number')}}"
                            >
                            <div>{{$errors->first('address.number')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[district]"
                                class="form-control {{$errors->has('address.district') ? 'is-invalid' : ''}}"
                                placeholder="Bairro"
                                value="{{old('address.district')}}"
                            >
                            <div>{{$errors->first('address.district')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[complement]"
                                class="form-control {{$errors->has('address.complement') ? 'is-invalid' : ''}}"
                                placeholder="Complemento"
                                value="{{old('address.complement')}}"
                            >
                            <div>{{$errors->first('address.complement')}}</div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="text"
                                name="phones[0][number]"
                                class="form-control phone {{$errors->has('phones.0.number') ? 'is-invalid' : ''}}"
                                placeholder="Telefone"
                                value="{{old('phones.0.number')}}"
                            >
                            <div>{{$errors->first('phones.0.number')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="text"
                                name="phones[1][number]"
                                class="form-control cellphone cep {{$errors->has('phones.1.cep') ? 'is-invalid' : ''}}"
                                placeholder="Celular"
                                value="{{old('phones.1.number')}}"
                            >
                            <div>{{$errors->first('phones.1.number')}}</div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3">
                    CRIAR CONTA
            </form>
        </div>
    </div>

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>


    <script>
        $('.cpf').mask('000.000.000-00');
        $('.cep').mask('00000-00');
        $('.uf').mask('SS');
        $('.phone').mask('(00) 0000-0000');
        $('.cellphone').mask('(00) 00000-0000');
    </script>
</body>
</html>
