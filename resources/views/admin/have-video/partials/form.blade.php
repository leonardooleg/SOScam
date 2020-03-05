<label for=""><strong>Статус</strong></label>
<select class="form-control" name="published">
    @if (isset($video->id))
        <option value="0" @if ($video->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($video->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for=""><strong>Наименование</strong></label>
<input type="text" class="form-control" name="title" placeholder="Назва події" value="{{$video->title ?? ""}}"
       required>

<label for=""><strong>Теги (укажіть для швидшого пошуку) *через кому</strong></label>
<input type="text" class="form-control" name="tags" id="tags"
       @if(isset($video))  value="{{  $video->tags->pluck('name')->implode(", ")  ?? '' }}" @endif>


<label for=""><strong>Slug (уникальное значение)</strong></label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{$video->slug ?? ""}}" readonly="">

<label for=""><strong>Короткий опис події*</strong></label>
<textarea class="form-control" id="description_short"
          name="description_short">{{$video->description_short ?? ""}}</textarea>

<label for=""><strong>Полное описание</strong></label>
<textarea class="form-control" id="description" name="description">{{$video->description ?? ""}}</textarea>

<div class="row">
    <div class="col-2">
        <label for=""><strong>Дата</strong></label>
        <input type="date" class="form-control" name="date" value="{{$video->date ?? ""}}" required>
    </div>
</div>




@if (isset($medias)!='')
    <hr/>
    <label for="basic-url"><strong>Медіа файли</strong></label>
    <div class="wrap-accadion load_img row row-cols-1 row-cols-md-3">
        @foreach($medias as $media)
            @if (isset($media)  )
                <div class="load_img_card col mb-4">
                    <div class="card h-100">
                        @if($media->type==1)
                            <a target="_blank" href="{{asset('/storage'. $media->link ?? '') }}"> <img
                                    src="{{asset('/storage'. $media->link ?? '') }}" class="card-img-top"></a>
                            <svg type="submit" class="my_del_x" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false"
                                 width="2em" height="2em"
                                 style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                 preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path
                                    d="M9 7h2l1 2.5L13 7h2l-2 5l2 5h-2l-1-2.5l-1 2.5H9l2-5l-2-5M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m0 2v14h14V5H5z"
                                    fill="#ff0000"/>
                            </svg>
                            <input type="text" name="photo[]" value="{{$media->link ?? ''}}" hidden class="hidden">
                        @else
                            <iframe src="https://www.youtube.com/embed/{{$media->link ?? '' }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen class="card-img-top"></iframe>
                            <svg class="my_del_x" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false"
                                 width="2em" height="2em"
                                 style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                 preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path
                                    d="M9 7h2l1 2.5L13 7h2l-2 5l2 5h-2l-1-2.5l-1 2.5H9l2-5l-2-5M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m0 2v14h14V5H5z"
                                    fill="#ff0000"/>
                            </svg>
                            <input type="text" name="video[]" value="{{$media->link ?? ''}}" hidden class="hidden">
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif
<hr/>


<label for="basic-url"><strong>Дополнительные картинки</strong></label>
<div class="input-group mb-3 hdtuto increment">
    <div class="custom-file">
        <input type="file" name="media_photo[]" class="custom-file-input myfrm" placeholder="Выбирете файл">
        <label class="custom-file-label" for="inputGroupFile03">Выбирете файл</label>
    </div>
    <div class="input-group-prepend">
        <button class="btn  btn-success btnimg" type="button">Добавить еще</button>
    </div>
</div>


<div class="clone" hidden>
    <div class="input-group mb-3 hdtuto ">
        <div class="custom-file">
            <input type="file" name="media_photo[]" class="custom-file-input myfrm">
            <label class="custom-file-label" for="inputGroupFile03">Выбирете еще файл</label>
        </div>
        <div class="input-group-prepend">
            <button class="btn  btn-danger btnimgdel" type="button">Удалить</button>
        </div>
    </div>
</div>
<hr/>
<label for="basic-url"><strong>Завантажити відеофайл</strong></label>
<div class="input-group mb-3 hdtuto increment">
    <div class="custom-file">
        <input type="file" name="video_file" class="custom-file-input myfrm" placeholder="Выбирете файл">
        <label class="custom-file-label" for="inputGroupFile03">Выбирете файл</label>
    </div>
</div>

<label for="basic-url"><strong>Посилання на Youtube-відео</strong></label>
<div class="input-group mb-3 hdtuto2 increment2">
    <div class="custom-file">
        <input type="text" class="form-control" name="media_video[]" placeholder="Посилання на відео">
    </div>

</div>


<hr/>

<div id="coordinates">
    Натисніть будь-де на карті. Або перетащіть маркер на місце аварії.
</div>
<div>
    <label>
        Широта
        <input type="text" name="lat" id="lat"/>
    </label>
    <label>
        Довгота
        <input type="text" name="lng" id="lng"/>
    </label>
    <label>
        Населений пункт
        <input type="text" name="city" id="city"/>
    </label>
    <label>
        Область
        <input type="text" name="region" id="region"/>
    </label>
    <label>
        Країна
        <input type="text" name="country" id="country"/>
    </label>
</div>
<div id="map"></div>
<script>

    function updateCoordinates(lat, lng) {
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;

        /*Міто*/
        new google.maps.Geocoder().geocode({
            'latLng': new google.maps.LatLng(lat, lng)
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    var country = null,
                        city = null,
                        region = null,
                        cityAlt = null;
                    var c, lc, component;
                    for (var r = 0, rl = results.length; r < rl; r += 1) {
                        var result = results[r];
                        if (!city && result.types[0] === 'locality') {
                            for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
                                component = result.address_components[c];
                                if (component.types[0] === 'locality') {
                                    city = component.long_name;
                                    break;
                                }
                            }
                        } else if (!country && result.types[0] === 'country') {
                            country = result.address_components[0].long_name;
                        } else if (!country && result.types[0] === 'administrative_area_level_1') {
                            region = result.address_components[0].long_name;
                        }
                    }
                    document.getElementById('city').value = city;
                    document.getElementById('country').value = country;
                    document.getElementById('region').value = region;
                }
            }
        });
        /*Міто*/
    }

    var position;

    function initMap() {
        console.log('initMap');
        var map, marker;
        var myLatlng = {
            lat: {{$video->lat ?? 49.58}},
            lng: {{$video->lng ?? 34.55}}
        };
        document.getElementById('lat').value = myLatlng.lat;
        document.getElementById('lng').value = myLatlng.lng;
        document.getElementById('city').value = "{{$video->city ?? ''}}";
        document.getElementById('country').value = "{{$video->country ?? ''}}";
        document.getElementById('region').value = "{{$video->region ?? ''}}";
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: myLatlng
        });

        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true
        });

        marker.addListener('dragend', function (e) {
            var position = marker.getPosition();
            updateCoordinates(position.lat(), position.lng())
        });

        map.addListener('click', function (e) {
            marker.setPosition(e.latLng);
            updateCoordinates(e.latLng.lat(), e.latLng.lng())
        });

        map.panTo(myLatlng);
    }
</script>


<label for=""><strong>Мета заголовок</strong></label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок"
       value="{{$video->meta_title ?? ""}}">

<label for=""><strong>Мета описание</strong></label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание"
       value="{{$video->meta_description ?? ""}}">

<label for=""><strong>Ключевые слова</strong></label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую"
       value="{{$video->meta_keyword ?? ""}}">
<hr/>
<hr/>

<input class="btn btn-primary" type="submit" style="position: absolute;" value="Сохранить">


<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU&libraries=places&region=UA&language=uk&callback=initMap"
    async defer></script>

