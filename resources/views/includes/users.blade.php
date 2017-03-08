@foreach($users as $user)
    <div class="cell4 cell-sm-6 cell-xs">
        <div class="item-manager box-border">
            <img src="{{ Helpers::getImage($user->photo, '300x0', null, 'fit') }}" alt="{{ $user->name }} - ЖК София">
            <p class="text-center name">{{ $user->name }}</p>
            <div class="relative">
                <i class="icon-phone"></i>
                <p>{!! Helpers::phone($user->phone) !!}</p>
            </div>

            <p class="mail"><i class="icon-mail"></i>{{ $user->email }}</p>
        </div>
    </div>
@endforeach