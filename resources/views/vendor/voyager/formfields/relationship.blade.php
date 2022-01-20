@if(isset($options->model) && isset($options->type))

    @if(class_exists($options->model))

        @php $relationshipField = $row->field; @endphp

        @if($options->type == 'belongsTo')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                    $query = $model::where($options->key,$relationshipData->{$options->column})->first();
                @endphp

                @if(isset($query))
                    <p>{{ $query->{$options->label} }}</p>
                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @else

                <select
                    class="form-control select2-ajax" name="{{ $options->column }}"
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                    @if($row->required == 1) required @endif
                >
                    @php
                        $model = app($options->model);
                        $query = $model::where($options->key, old($options->column, $dataTypeContent->{$options->column}))->get();
                    @endphp

                    @if(!$row->required)
                        <option value="">{{__('voyager::generic.none')}}</option>
                    @endif

                    @foreach($query as $relationshipData)
                        <option value="{{ $relationshipData->{$options->key} }}" @if(old($options->column, $dataTypeContent->{$options->column}) == $relationshipData->{$options->key}) selected="selected" @endif>{{ $relationshipData->{$options->label} }}</option>
                    @endforeach
                </select>

            @endif

        @elseif($options->type == 'hasOne')

            @php
                $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                $model = app($options->model);
                $query = $model::where($options->column, '=', $relationshipData->{$options->key})->first();

            @endphp

            @if(isset($query))
                <p>{{ $query->{$options->label} }}</p>
            @else
                <p>{{ __('voyager::generic.no_results') }}</p>
            @endif

        @elseif($options->type == 'hasMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);

                    $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get()->map(function ($item, $key) use ($options) {
                        return $item->{$options->label};
                    })->all();
                @endphp

                @if($view == 'browse')
                    <p>{{ count($selected_values) . ' '. ($display_name ?? $options->table)}}</p>
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                <li>{{ $selected_value }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif

            @elseif (isset($view) && $view == 'edit')

                @php
                    $model = app($options->model);
                    $query = $model::where($options->column, '=', $dataTypeContent->getKey())->get();
                @endphp

                @if(isset($query))
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover dataTable">
                            <thead>
                                <tr>
                                    @php
                                    $dataTypeRelationship = Voyager::model('DataType')->where('slug', '=', $options->table)->first();
                                    @endphp
                                    @foreach($dataTypeRelationship->browseRows as $row)
                                    @if(!($row->type == 'relationship' && $row->details->table == $dataType->slug))
                                        <th>
                                            {{ $row->getTranslatedAttribute('display_name') }}
                                        </th>
                                    @endif
                                    @endforeach
                                    <th class="actions text-right"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($query as $data)
                                <tr>
                                    @foreach($dataTypeRelationship->browseRows as $row)
                                        @php
                                        if ($data->{$row->field.'_browse'}) {
                                            $data->{$row->field} = $data->{$row->field.'_browse'};
                                        }
                                        @endphp
                                        @if(!($row->type == 'relationship' && $row->details->table == $dataType->slug))
                                        <td>
                                            @if (isset($row->details->view))
                                                @include($row->details->view, ['row' => $row, 'dataType' => $dataTypeRelationship, 'dataTypeContent' => $query, 'content' => $data->{$row->field}, 'action' => 'browse'])
                                            @elseif($row->type == 'image')
                                                <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                            @elseif($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['view' => 'browse','options' => $row->details])
                                            @elseif($row->type == 'select_multiple')
                                                @if(property_exists($row->details, 'relationship'))

                                                    @foreach($data->{$row->field} as $item)
                                                        {{ $item->{$row->field} }}
                                                    @endforeach

                                                @elseif(property_exists($row->details, 'options'))
                                                    @if (!empty(json_decode($data->{$row->field})))
                                                        @foreach(json_decode($data->{$row->field}) as $item)
                                                            @if (@$row->details->options->{$item})
                                                                {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        {{ __('voyager::generic.none') }}
                                                    @endif
                                                @endif

                                                @elseif($row->type == 'multiple_checkbox' && property_exists($row->details, 'options'))
                                                    @if (@count(json_decode($data->{$row->field})) > 0)
                                                        @foreach(json_decode($data->{$row->field}) as $item)
                                                            @if (@$row->details->options->{$item})
                                                                {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        {{ __('voyager::generic.none') }}
                                                    @endif

                                            @elseif(($row->type == 'select_dropdown' || $row->type == 'radio_btn') && property_exists($row->details, 'options'))

                                                {!! $row->details->options->{$data->{$row->field}} ?? '' !!}

                                            @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                @if ( property_exists($row->details, 'format') && !is_null($data->{$row->field}) )
                                                    {{ \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($row->details->format) }}
                                                @else
                                                    {{ $data->{$row->field} }}
                                                @endif
                                            @elseif($row->type == 'checkbox')
                                                @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                    @if($data->{$row->field})
                                                        <span class="label label-info">{{ $row->details->on }}</span>
                                                    @else
                                                        <span class="label label-danger">{{ $row->details->off }}</span>
                                                    @endif
                                                @else
                                                {{ $data->{$row->field} }}
                                                @endif
                                            @elseif($row->type == 'color')
                                                <span class="badge badge-lg" style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span>
                                            @elseif($row->type == 'text')
                                                @include('voyager::multilingual.input-hidden-bread-browse')
                                                @if($row->field == 'thumbnail')
                                                <img src="{{ $data->{$row->field} }}" style="width:100px">
                                                @else
                                                <div>{{ mb_strlen( $data->{$row->field} ) > 100 ? mb_substr($data->{$row->field}, 0, 100) . ' ...' : $data->{$row->field} }}</div>
                                                @endif
                                            @elseif($row->type == 'text_area')
                                                @include('voyager::multilingual.input-hidden-bread-browse')
                                                <div>{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                            @elseif($row->type == 'file' && !empty($data->{$row->field}) )
                                                @include('voyager::multilingual.input-hidden-bread-browse')
                                                @if(json_decode($data->{$row->field}) !== null)
                                                    @foreach(json_decode($data->{$row->field}) as $file)
                                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" target="_blank">
                                                            {{ $file->original_name ?: '' }}
                                                        </a>
                                                        <br/>
                                                    @endforeach
                                                @else
                                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field}) }}" target="_blank">
                                                        Download
                                                    </a>
                                                @endif
                                            @elseif($row->type == 'rich_text_box')
                                                @include('voyager::multilingual.input-hidden-bread-browse')
                                                <div>{{ mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</div>
                                            @elseif($row->type == 'coordinates')
                                                @include('voyager::partials.coordinates-static-image')
                                            @elseif($row->type == 'multiple_images')
                                                @php $images = json_decode($data->{$row->field}); @endphp
                                                @if($images)
                                                    @php $images = array_slice($images, 0, 3); @endphp
                                                    @foreach($images as $image)
                                                        <img src="@if( !filter_var($image, FILTER_VALIDATE_URL)){{ Voyager::image( $image ) }}@else{{ $image }}@endif" style="width:50px">
                                                    @endforeach
                                                @endif
                                            @elseif($row->type == 'media_picker')
                                                @php
                                                    if (is_array($data->{$row->field})) {
                                                        $files = $data->{$row->field};
                                                    } else {
                                                        $files = json_decode($data->{$row->field});
                                                    }
                                                @endphp
                                                @if ($files)
                                                    @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                        @foreach (array_slice($files, 0, 3) as $file)
                                                        <img src="@if( !filter_var($file, FILTER_VALIDATE_URL)){{ Voyager::image( $file ) }}@else{{ $file }}@endif" style="width:50px">
                                                        @endforeach
                                                    @else
                                                        <ul>
                                                        @foreach (array_slice($files, 0, 3) as $file)
                                                            <li>{{ $file }}</li>
                                                        @endforeach
                                                        </ul>
                                                    @endif
                                                    @if (count($files) > 3)
                                                        {{ __('voyager::media.files_more', ['count' => (count($files) - 3)]) }}
                                                    @endif
                                                @elseif (is_array($files) && count($files) == 0)
                                                    {{ trans_choice('voyager::media.files', 0) }}
                                                @elseif ($data->{$row->field} != '')
                                                    @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                        <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:50px">
                                                    @else
                                                        {{ $data->{$row->field} }}
                                                    @endif
                                                @else
                                                    {{ trans_choice('voyager::media.files', 0) }}
                                                @endif
                                            @elseif($row->type == 'number')
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            <span>{{ number_format($data->{$row->field}, 0,'',' ') }}</span>
                                            @else
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            <span>{{ $data->{$row->field} }}</span>
                                            @endif
                                        </td>
                                        @endif
                                    @endforeach
                                    <td class="no-sort no-click text-center" id="bread-actions">
                                        @php
                                        $actions = [];
                                        foreach (Voyager::actions() as $action) {
                                            $action = new $action($dataTypeRelationship, $data);

                                            if ($action->getTitle() != __('voyager::generic.delete') && $action->shouldActionDisplayOnDataType()) {
                                                $actions[] = $action;
                                            }
                                        }
                                        @endphp
                                        @foreach($actions as $action)
                                            @if (!method_exists($action, 'massAction'))
                                                @include('voyager::bread.partials.actions', ['action' => $action, 'dataType' => $dataTypeRelationship])
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @else
                @php
                    $model = app($options->model);
                    $query = $model::where($options->column, '=', $dataTypeContent->{$options->key})->get();
                @endphp

                @if(isset($query))
                    <ul>
                        @foreach($query as $query_res)
                            <li>{{ $query_res->{$options->label} }}</li>
                        @endforeach
                    </ul>

                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @endif

        @elseif($options->type == 'belongsToMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                    $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table, $options->foreign_pivot_key ?? null, $options->related_pivot_key ?? null, $options->parent_key ?? null, $options->key)->get()->map(function ($item, $key) use ($options) {
            			return $item->{$options->label};
            		})->all() : array();
                @endphp

                @if($view == 'browse')
                    @php
                        $string_values = implode(", ", $selected_values);
                        if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                    @endphp
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <p>{{ $string_values }}</p>
                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                <li>{{ $selected_value }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif

            @else
                <select
                    class="form-control select2-ajax @if(isset($options->taggable) && $options->taggable === 'on') taggable @endif"
                    name="{{ $relationshipField }}[]" multiple
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                    @if(isset($options->taggable) && $options->taggable === 'on')
                        data-route="{{ route('voyager.'.\Illuminate\Support\Str::slug($options->table).'.store') }}"
                        data-label="{{$options->label}}"
                        data-error-message="{{__('voyager::bread.error_tagging')}}"
                    @endif
                    @if($row->required == 1) required @endif
                >

                        @php
                            $selected_keys = [];

                            if (!is_null($dataTypeContent->getKey())) {
                                $selected_keys = $dataTypeContent->belongsToMany(
                                    $options->model,
                                    $options->pivot_table,
                                    $options->foreign_pivot_key ?? null,
                                    $options->related_pivot_key ?? null,
                                    $options->parent_key ?? null,
                                    $options->key
                                )->pluck($options->table.'.'.$options->key);
                            }
                            $selected_keys = old($relationshipField, $selected_keys);
                            $selected_values = app($options->model)->whereIn($options->key, $selected_keys)->pluck($options->label, $options->key);
                        @endphp

                        @if(!$row->required)
                            <option value="">{{__('voyager::generic.none')}}</option>
                        @endif

                        @foreach ($selected_values as $key => $value)
                            <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                        @endforeach

                </select>

            @endif

        @endif

    @else

        cannot make relationship because {{ $options->model }} does not exist.

    @endif

@endif
