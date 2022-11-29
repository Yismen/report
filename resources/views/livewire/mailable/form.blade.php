<div>
    @php

    $title = $editing ? join(" ", [ __('Edit'), __('Mailable'), $mailable->name]) : join(" ", [__('Create'),
    __('New'), __('Mailable') ])
    @endphp

    <x-report::modal modal-name="MailableForm" title="{{ $title }}" event-name="{{ $this->modal_event_name_form }}"
        :backdrop="false">

        <x-report::form :editing="$editing">
            <div class="p-3">
                <x-report::inputs.with-labels field="mailable.name">{{ __('Name') }}:
                </x-report::inputs.with-labels>

                <x-report::inputs.text-area field="mailable.description" :required="false">{{ __('Description') }}:
                </x-report::inputs.text-area>

                <h5 class="border-top pt-1">{{ __('Recipients') }}</h5>
                @foreach ($recipients_list as $recipient_id => $recipient_name)
                <x-report::inputs.switch field="recipients" value="{{ $recipient_id }}"
                    wire:key='recipient{{ $recipient_id }}'>{{ $recipient_name }}
                </x-report::inputs.switch>
                @endforeach
            </div>
        </x-report::form>
    </x-report::modal>
</div>