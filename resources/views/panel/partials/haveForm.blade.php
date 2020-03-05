<div class="add-filter">
    <div class="row">
        <div class="col-md-12">
            <a href="/have-video/{{$video->slug}}" class="badge badge-primary font-weight-bolder float-right">
                Переглянути на сайті
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <h5 class="title-list">Коротка інформація</h5>
        </div>
        <div class="col-lg-10 widget-form">
            <div class="filter-form form-addlist">
                <p class="input-info">
                    <label class="nhan">Заголовок*</label>
                    <input type="text" name="title" placeholder="Назва події" value="{{$video->title ?? ""}}" id="title"
                           required>
                </p>
                <p class="input-info">
                    <label class="nhan">Короткий опис події*</label>
                    <textarea class="" tabindex="4"
                              name="description_short">{{$video->description_short ?? ""}}</textarea>
                </p>
                <p class="input-info">
                    <label class="nhan">Повний опис*</label>
                    <textarea class="" tabindex="4" name="description">{{$video->description ?? ""}}</textarea>
                </p>
            </div>

            <div class="more-filter">
                <label class="nhan">Теги (укажіть для швидшого пошуку) *через кому</label>
                <input type="text" placeholder="наприклад: аварія, автомобіль, Полтава" class="form-control" name="tags"
                       id="tags"
                       @if(isset($video))  value="{{  $video->tags->pluck('name')->implode(", ")  ?? '' }}" @endif>
            </div>

        </div>
    </div>
</div>
<div class="wrap-accadion">
    <div class="row">
        <div class="col-lg-2">
            <h5 class="title-list">Місце пригоди</h5>
        </div>
        <div class="col-lg-10">

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
                </label><br>
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
            <div id="coordinates">
                *Натисніть будь-де на карті. Або перетащіть маркер на місце аварії.
            </div>
            <br>
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

            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU&libraries=places&region=UA&language=uk&callback=initMap"
                async defer></script>


        </div>

    </div>
</div>
<div class="wrap-accadion">
    <div class="row">
        <div class="col-lg-2">
            <h5 class="title-list">Мультимедіа</h5>
        </div>
        <div class="col-lg-10">
            <label for="basic-url"><strong>Медіа файли </strong></label>
            @if (isset($medias)!='')
                <div class="load_img row row-cols-1 row-cols-md-3">
                    @foreach($medias as $media)
                        @if (isset($media)  )
                            <div class="load_img_card col-md-4 mb-4">
                                <div class="card h-100">
                                    @if($media->kind==2)
                                        <a target="_blank"
                                           href="https://drive.google.com/uc?id={{$media->link ?? '' }}"> <img
                                                src="https://drive.google.com/uc?id={{ $media->link ?? '' }}"
                                                class="card-img-top"></a>
                                        <svg type="submit" class="my_del_x" xmlns="http://www.w3.org/2000/svg"
                                             aria-hidden="true" focusable="false" width="2em" height="2em"
                                             style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                            <path
                                                d="M9 7h2l1 2.5L13 7h2l-2 5l2 5h-2l-1-2.5l-1 2.5H9l2-5l-2-5M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m0 2v14h14V5H5z"
                                                fill="#ff0000"/>
                                        </svg>
                                        <input type="text" name="photo[]" value="{{$media->link ?? ''}}" hidden
                                               class="hidden">
                                    @else
                                        <iframe src="https://drive.google.com/file/d/{{$media->link}}/preview"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen class="card-img-top"></iframe>
                                        <svg class="my_del_x" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                             focusable="false" width="2em" height="2em"
                                             style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                            <path
                                                d="M9 7h2l1 2.5L13 7h2l-2 5l2 5h-2l-1-2.5l-1 2.5H9l2-5l-2-5M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m0 2v14h14V5H5z"
                                                fill="#ff0000"/>
                                        </svg>
                                        <input type="text" name="video[]" value="{{$media->link ?? ''}}" hidden
                                               class="hidden">
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            <div class="add-images">
                <label class="nhan">Додати фото матеріал (можна відразу вибирати декілька файлів)</label>
                <div class="input-group mb-3 hdtuto increment">
                    <div class="custom-file">
                        <input type="file" name="media_photo[]" class="input-default-js custom-file-input myfrm"
                               data-multiple-target="{count} файлів вибрано" id="file-with-multi-file" multiple
                               placeholder="Выбирете файл">
                        <label class="label-for-default-js rounded-right custom-file-label"
                               for="file-with-multi-file"></label>
                    </div>
                    <div class="input-group-prepend">
                        <button class="btn  btn-success btnimg" type="button">Додати ще</button>
                    </div>
                </div>
                <div class="clone" hidden>
                    <div class="input-group mb-3 hdtuto ">
                        <div class="custom-file">
                            <input type="file" name="media_photo[]" id="customFile2" class="custom-file-input myfrm"
                                   data-multiple-target="{count} файлів вибрано">
                            <label class="label-for-default-js rounded-right custom-file-label" for="customFile2">Выбирете
                                еще файл</label>
                        </div>
                        <div class="input-group-prepend">
                            <button class="btn  btn-danger btnimgdel" type="button">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
            <label class="nhan">Завантажити відеофайл</label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="video_file" class="custom-file-input " placeholder="Выбирете файл">
                    <label class="custom-file-label">Выбирете файл</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="info-contact">
    <div class="row">
        <div class="col-lg-2">
            <h5 class="title-list">Інформація</h5>
        </div>
        <div class="col-lg-10 profile">
            <div class="open-hour">
                <label class="nhan">Час події*</label>
                <div class="row">
                    <div class="col-3">
                        <input type="date" class="form-control" name="date" value="{{$video->date ?? ""}}" required>
                    </div>
                </div>
            </div>
            <label class="nhan">Контакти</label>

            <ul class="add-section">
                <li class="twitter"><i class="fa fa-twitter-square twitter"></i><span>Twitter</span><a
                        href="https://twitter.com/" title="">https://twitter.com/</a><i
                        class="fa fa-minus-circle float-right"></i></li>
                <li class="face"><i class="fa fa-facebook-square face"></i><span>Facebook</span><a
                        href="https://www.facebook.com/" title="">https://www.facebook.com/</a><i
                        class="fa fa-minus-circle float-right"></i></li>
                <li class="youtube"><i class="fa fa-youtube-square youtube"></i><span>Youtube</span><i
                        class="fa fa-minus-circle float-right"></i></li>
                <li class="add"><a href="#" class="add">Add new section</a><a href="#"
                                                                              class="float-right"><i
                            class="fa fa-plus-circle"></i></a></li>
            </ul>

            <div class="button-addlisting">
                <button type="submit" class="flat-button">Зберегти
                </button>
            </div>
        </div>
    </div>
</div>

