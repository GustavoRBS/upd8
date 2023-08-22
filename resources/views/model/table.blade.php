<div class="table-body">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-dark" @if(isset($tableId) && $tableId) {!! 'id="'.$tableId.'"' !!} @endif>
                    <thead>
                        <tr>
                            @foreach($header as $key => $title)
                            <th scope="col" {!! (is_array($title) && !is_null($title[1])) ? $title[1] : null !!}>{!! (is_array($title) && !is_null($title[0])) ? $title[0] : $title !!}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($content as $line)
                        <tr>
                            @foreach($line as $key => $value)
                            @if($key === array_key_first($line))
                            <th scope="row" {!! (is_array($value) && !is_null($value[1])) ? $value[1] : null !!}>
                                {!! (is_array($value) && !is_null($value[0])) ? $value[0] : $value !!}
                            </th>
                            @else
                            <td {!! (is_array($value) && !is_null($value[1])) ? $value[1] : null !!}>{!! (is_array($value) && !is_null($value[0])) ? $value[0] : $value !!}</td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@if($footer)
<div class="row mt-3">
    <div class="col-12" @if(isset($tableId) && $tableId) {!! 'id="'.$tableId.'-pagination"' !!} @endif>
        <div class="div-pagination">
            {!! $footer !!}
        </div>
    </div>
</div>
@endif
