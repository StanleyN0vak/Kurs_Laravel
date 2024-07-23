@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            	{{ html()->form('PATCH',route('videos.update', $video->id))->class('form-horizontal')->open() }}
            		<div class="form-group">
                        <div class="col-md-4 control-label">
                            {{ html()->label('Tytuł:') }}
                        </div>
                        <div class="col-md-6">
                            {{ html()->text('title')->value($video->title)->class('form-control') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 control-label">
                            {{ html()->label('Opis:') }}
                        </div>
                        <div class="col-md-6">
                            {{ html()->textarea('description')->value($video->description)->class('form-control') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 control-label">
                            {{ html()->label('URL filmu:') }}
                        </div>
                        <div class="col-md-6">
                            {{ html()->text('url')->value($video->url)->class('form-control') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 control-label">
                            {{ html()->label('Wybierz kategorie:') }}
                        </div>
                        <div class="col-md-6">
                            {{ html()->select('CategoryList[]',
                                $categories,
                                null, 
                                ['multiple' => 'multiple']
                            )->class('form-control') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ html()->submit('Edytuj Artykuł')->class('btn btn-primary') }}
                        </div>
                    </div>

            	{{ html()->form()->close() }}
            </div>
        </div>
    </div>
</div>
@endsection