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
       value="@foreach($video->tags as $tag){{$tag->name ?? ''}}, @endforeach">


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
</div>
<div id="map"></div>
<script>
    function updateCoordinates(lat, lng) {
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        console.log('update');
    }

    function initMap() {
        console.log('initMap');
        var map, marker;
        var myLatlng = {
            lat: {{$video->lat ?? 49.58}},
            lng: {{$video->lng ?? 34.55}}
        };
        document.getElementById('lat').value = myLatlng.lat;
        document.getElementById('lng').value = myLatlng.lng;

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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU&libraries=places&callback=initMap"
    async defer></script>

