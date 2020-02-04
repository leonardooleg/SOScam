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
<input type="text" class="form-control" name="title" placeholder="Наименование товара" value="{{$video->title ?? ""}}"
       required>

<label for=""><strong>Теги (укажіть для швидшого пошуку) *через кому</strong></label>
<input type="text" class="form-control" name="tags" id="tags"
       @if(isset($video))    value="@foreach($video->tags as $tag){{$tag->name ?? ''}}, @endforeach" @endif>


<label for=""><strong>Slug (уникальное значение)</strong></label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{$video->slug ?? ""}}" readonly="">

<label for=""><strong>Краткое описание</strong></label>
<textarea class="form-control" id="description_short"
          name="description_short">{{$video->description_short ?? ""}}</textarea>

<label for=""><strong>Полное описание</strong></label>
<textarea class="form-control" id="description" name="description">{{$video->description ?? ""}}</textarea>

<div class="row">
    <div class="col-2">
        <label for=""><strong>Дата</strong></label>
        <input type="date" class="form-control" name="date" value="{{$video->date ?? ""}}" required>
    </div>
    <div class="col-2">
        <label for=""><strong>Час</strong></label>
        <input type="time" class="form-control" name="time" value="{{$video->time ?? ""}}">
    </div>
</div>
<hr/>
<label for="basic-url"><strong>Медіа файли</strong></label>
@if (isset($medias)!='')
    @foreach($medias as $media)
        @if (isset($media)  )
            <div class="row">
                <div class="col-md-4">
                    @if($media->type==1) <img @else
                        <iframe @endif @if($media->type==1) src="{{asset('/storage/'. $media->link ?? '') }}"
                                @else src="{{$media->link ?? '' }}" @endif   width="100%"
                                @if($media->type==2) frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen @endif>@if($media->type==2) </iframe> @endif
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" @if($media->type==1) name="media_photo[]"
                           @else name="media_video[]" @endif  placeholder="посилання на фото"
                           value="{{$media->link ?? ""}}">
                </div>
            </div>
        @endif
    @endforeach
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

<label for="basic-url"><strong>Дополнительные видео</strong></label>
<div class="input-group mb-3 hdtuto2 increment2">
    <div class="custom-file">
        <input type="text" class="form-control" name="media_video[]" placeholder="Посилання на відео">
    </div>

</div>


<hr/>

<div id="coordinates">
    <p>Для того, чтобы выделить нужную область (создать окружность):</p>

    <ol>
        <li>Укажите её центр (первый клик по карте). Появится маркер.</li>
        <li>Задайте радиус. Кликните по точке, которая должна быть на границе окружности (второй клик по карте).</li>
    </ol>
</div>

<div id="my_map" style="width:100%;height:400px"></div>
<hr/>
<div>
    <label>
        Широта
        <input type="text" name="lat" id="lat" value="{{$video->lat ?? 50.45127}}"/>
    </label>
    <label>
        Довгота
        <input type="text" name="lng" id="lng" value="{{$video->lng ?? 50.45127}}"/>
    </label>
    <label>
        Радіус
        <input type="text" name="radius" id="radius" value="{{$video->radius ?? 50}}"/>
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
<script>
    var map, circle, circleOptions, setCenter, marker;

    function initialize() {
        var myLatlng = new google.maps.LatLng({{$video->lat ?? 0}}, {{$video->lng ?? 0}}); //Kiev
        var myOptions = {
            zoom: 9,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        map = new google.maps.Map(document.getElementById("my_map"), myOptions);

        setCenter = true;

        circleOptions = {
            fillColor: "#00AAFF",
            fillOpacity: 0.5,
            strokeColor: "#FFAA00",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            clickable: false,
            center: myLatlng,
            radius: {{$video->radius ?? 50000}},
        };
        /*виводити дані які вже є*/
        circle = new google.maps.Circle(circleOptions);
        circle.setMap(map);
        marker = new google.maps.Marker({
            position: myLatlng,
        });
        marker.setMap(map);
        /*виводити дані які вже є*/

        google.maps.event.addListener(map, 'click', function (event) {
            if (setCenter) {
                if (marker != undefined) {
                    marker.setMap(null);
                }
                marker = new google.maps.Marker({
                    position: event.latLng,
                    clickable: false
                });
                marker.setMap(map);
                circleOptions.center = event.latLng;
                setCenter = false;
            } else {
                //СЂР°СЃСЃС‡РёС‚С‹РІР°РµРј СЂР°СЃСЃС‚РѕСЏРЅРёРµ РјРµР¶РґСѓ С‚РѕС‡РєР°РјРё
                var radius = distHaversine(circleOptions.center, event.latLng);
                circleOptions.radius = radius * 1000;
                if (circle != undefined) {
                    circle.setMap(null);
                }
                circle = new google.maps.Circle(circleOptions);
                circle.setMap(map);
                setCenter = true;
                updateCoordinates(event.latLng.lat(), event.latLng.lng(), circleOptions.radius); //заповнення полів


            }
        });
    }

    function updateCoordinates(lat, lng, radius) {
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        document.getElementById('radius').value = radius;
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

    function loadScript() {
        var script = document.createElement("script");
        script.src = "http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU&callback=initialize";
        document.body.appendChild(script);
    }

    //http://stackoverflow.com/questions/1502590/calculate-distance-between-two-points-in-google-maps-v3
    rad = function (x) {
        return x * Math.PI / 180;
    };

    distHaversine = function (p1, p2) {
        var R = 6371; // earth's mean radius in km
        var dLat = rad(p2.lat() - p1.lat());
        var dLong = rad(p2.lng() - p1.lng());

        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;

        return d.toFixed(3);
    };

    window.onload = loadScript;
    document.getElementById('city').value = "{{$video->city ?? ''}}";
    document.getElementById('country').value = "{{$video->country ?? ''}}";
    document.getElementById('region').value = "{{$video->region ?? ''}}";
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




