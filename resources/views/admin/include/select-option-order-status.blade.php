@switch($order->status)
    @case(\App\Enums\OrderStatus::Waiting)
    <select  id="status" name="status" class="form-control">
        <option value="{{\App\Enums\OrderStatus::Cancel}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Cancel) ? "selected" : "" }}
        >Cancel
        </option>
        <option value="{{\App\Enums\OrderStatus::Done}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Done) ? "selected" : "" }}
        >Done
        </option>
        <option value="{{\App\Enums\OrderStatus::Waiting}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Waiting) ? "selected" : "" }}
        >Waiting
        </option>
        <option value="{{\App\Enums\OrderStatus::Processing}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Processing) ? "selected" : "" }}
        >Processing
        </option>
        <option value="{{\App\Enums\OrderStatus::Deleted}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Deleted) ? "selected" : "" }}
        >Deleted
        </option>
    </select>
    @break
    @case(\App\Enums\OrderStatus::Cancel)
    <select id="status" name="status" class="form-control">
        <option value="{{\App\Enums\OrderStatus::Cancel}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Cancel) ? "selected" : "" }}
        >Cancel
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Done}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Done) ? "selected" : "" }}
        >Done
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Waiting}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Waiting) ? "selected" : "" }}
        >Waiting
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Processing}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Processing) ? "selected" : "" }}
        >Processing
        </option>
        <option value="{{\App\Enums\OrderStatus::Deleted}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Deleted) ? "selected" : "" }}
        >Deleted
        </option>
    </select>
    @break
    @case(\App\Enums\OrderStatus::Deleted)
    <select id="status" name="status" class="form-control">
        <option style="font-weight: normal" class="font-weight-light" value="{{\App\Enums\OrderStatus::Cancel}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Cancel) ? "selected" : "" }}
        >Cancel
        </option>
        <option style="font-weight: normal"  value="{{\App\Enums\OrderStatus::Done}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Done) ? "selected" : "" }}
        >Done
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Waiting}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Waiting) ? "selected" : "" }}
        >Waiting
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Processing}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Processing) ? "selected" : "" }}
        >Processing
        </option>
        <option value="{{\App\Enums\OrderStatus::Deleted}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Deleted) ? "selected" : "" }}
        >Deleted
        </option>
    </select>
    @break
    @case(\App\Enums\OrderStatus::Done)
    <select id="status" name="status" class="form-control">
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Cancel}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Cancel) ? "selected" : "" }}
        >Cancel
        </option>
        <option value="{{\App\Enums\OrderStatus::Done}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Done) ? "selected" : "" }}
        >Done
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Waiting}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Waiting) ? "selected" : "" }}
        >Waiting
        </option>
        <option style="font-weight: normal" value="{{\App\Enums\OrderStatus::Processing}}" disabled
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Processing) ? "selected" : "" }}
        >Processing
        </option>
        <option value="{{\App\Enums\OrderStatus::Deleted}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Deleted) ? "selected" : "" }}
        >Deleted
        </option>
    </select>
    @break
    @case(\App\Enums\OrderStatus::Processing)
    <select id="status" name="status" class="form-control">
        <option value="{{\App\Enums\OrderStatus::Cancel}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Cancel) ? "selected" : "" }}
        >Cancel
        </option>
        <option value="{{\App\Enums\OrderStatus::Done}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Done) ? "selected" : "" }}
        >Done
        </option>
        <option value="{{\App\Enums\OrderStatus::Waiting}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Waiting) ? "selected" : "" }}
        >Waiting
        </option>
        <option value="{{\App\Enums\OrderStatus::Processing}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Processing) ? "selected" : "" }}
        >Processing
        </option>
        <option value="{{\App\Enums\OrderStatus::Deleted}}"
            {{isset($order->status) && ($order->status == \App\Enums\OrderStatus::Deleted) ? "selected" : "" }}
        >Deleted
        </option>
    </select>
    @break
@endswitch

