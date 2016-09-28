<?php
    $TEMPLATE_INDEX = \App\Globals\GlobalsConst::TEMPLATE_INDEX;
    $i = 0;
    $usage_type = 0;
    $strength_quantity = 0;
    $dosage_strength = 0;
    $usage_quantity = 0;
    $quantity_unit = 0;
    $frequencies = 0;
    $extra_note = 0;

$prescriptionsDetailsCount = count($prescriptionsDetails);
$rowCounter = $prescriptionsDetailsCount == 0 ? 1 : $prescriptionsDetailsCount;
?>
{{-- Detail Row As At Zero Index --}}
@if(($prescriptionsDetails) != null)
    @if(($prescriptionsDetails->count()))
        @foreach($prescriptionsDetails as $k => $pd)
            <?php
                $i = --$rowCounter;
                $usage_type         = $pd->usage_type;
                $strength_quantity  = $pd->strength_quantity;
                $dosage_strength    = $pd->dosage_strength;
                $usage_quantity     = $pd->usage_quantity;
                $quantity_unit      = $pd->quantity_unit;
                $extra_note         = $pd->extra_note;

            ?>
            @include('prescriptions.includes.zero_detail_row')
        @endforeach
    @else
        @include('prescriptions.includes.zero_detail_row')
    @endif
@else
    @include('prescriptions.includes.zero_detail_row')
@endif
<span id="checkUpImgPath" class="dN">{{$prescriptionCheckUpImgPath}}</span>
<img src="{{$prescriptionCheckUpImgPath}}" alt="">



{{--Detail Row As Template--}}
<div id="detailRowTemplate" class="form-group list-group h170 dN">
    <div class="col-xs-12 prnt3">
        <a href="javascript:void(0)" class="col-xs-12 list-group-item list-group-item-action active  h55">
            <h4 class="col-xs-4">Row <span class="row-count-display">1</span></h4>
            <h4 class="col-xs-3 fR mT0 prnt1">
                <div class="fL mL5 mT10">Remove Detail Row</div>
                <button class="fR btn btn-default removeButton" type="button"><i class="fa fa-minus"></i></button>
            </h4>
        </a>
        <a href="javascript:void(0)" class="col-xs-12 p5 list-group-item list-group-item-action h130">
            <div class="form-group col-xs-2 pR2 mB3">
                <div class="col-xs-12">
                    {{usage_type_drop_down($TEMPLATE_INDEX)}}
                    <span id="error_usage_type" class="field-validation-msg"></span>
                </div>
            </div>
            <div class="form-group col-xs-3 pR2 mB3">
                <div class="col-xs-12">
                    {{dosage_form_drop_down($TEMPLATE_INDEX)}}
                    <span id="errorName" class="field-validation-msg"></span>
                </div>
            </div>
            <div class="form-group col-xs-5 pR2 mB3">
                <div class="col-xs-12">
                    {{medicine_drop_down($TEMPLATE_INDEX)}}
                    <span id="errorName" class="field-validation-msg"></span>
                </div>
            </div>
            <div class="form-group col-xs-3 pR2 mB3">
                <div class="col-xs-12 prescription-qty-unit-css">
                    <input type="text" id="st_quantity" name="strength_quantity[{{$TEMPLATE_INDEX}}]" class="form-control col-xs-3" value="" placeholder="Qty">
                    {{dosage_strength_form_drop_down($TEMPLATE_INDEX)}}
                    <span id="errorName" class="field-validation-msg"></span>
                </div>
            </div>
            <div class="form-group col-xs-3 pR2 mB3">
                <div class="col-xs-12 prescription-qty-unit-css">
                    <input type="text" id="quantity" name="usage_quantity[{{$TEMPLATE_INDEX}}]" class="form-control col-xs-3" value="" placeholder="Qty">
                    {{dosage_qty_unit_drop_down($TEMPLATE_INDEX)}}
                    <span id="errorName" class="field-validation-msg"></span>
                </div>
            </div>
            <div class="form-group col-xs-4 pR2 mB3">
                <div class="col-xs-12 frequencies-multi-slct">
                    <input type="hidden" id="frequencies" name="frequencies[{{$TEMPLATE_INDEX}}]" class="form-control col-xs-3" value="">
                    {{frequency_drop_down($TEMPLATE_INDEX)}}
                    <span id="errorName" class="field-validation-msg"></span>
                </div>
            </div>
            <div class="form-group col-xs-6 pR2 mB3">
                <div class="col-xs-11">
                    <textarea type="text" id="extra_note" name="extra_note[{{$TEMPLATE_INDEX}}]" rows="2" cols="20" class="form-control" placeholder="Extra Note">{{{ Form::getValueAttribute('extra_note', null) }}}</textarea>
                    <span id="errorName" class="field-validation-msg"></span>
                </div>
            </div>
        </a>
    </div>
</div>

<script src="{{asset('js/view-pages/prescriptions/PrescriptionDetailForm.js')}}"></script>
<script type="text/javascript">

        rowCount = "{{$prescriptionsDetailsCount}}";
        window.PrescriptionDetailRowIndex = parseInt(rowCount) - 1;
        var options = {rowCount: parseInt(rowCount)};

        var prescriptionDetailForm = new PrescriptionDetailForm(window, document, options);
        prescriptionDetailForm.initializeAll();


</script>