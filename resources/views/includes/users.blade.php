
@foreach($users as $user)
    <div class="cell4 cell-sm-6 cell-xs">
        <div class="item-manager box-border">
            <img class="m_b-10" src="{{ Helpers::getImage($user->photo, '300x0', null, 'fit') }}" alt="{{ $user->name }}">
            <div class="text-center name m_b-10">{{ $user->name }}</div>

            @if(!empty($user->phone))
                <div class="relative">
                    <i class="icon-phone"></i>
                    <p>{!! Helpers::phone($user->phone) !!}</p>
                </div>
            @endif

            @if(!empty($user->email))
                <p class="mail"><i class="icon-mail"></i>{{ $user->email }}</p>
            @endif
        </div>
    </div>
@endforeach
