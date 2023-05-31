<x-sidemenu>
    <x-side-menu-item url="dashboard" title="Dashboard"/>
    {{-- @role('super-admin') --}}
    {{-- <x-side-menu-item url="roles" icon="users" title="Role" /> --}}
    <x-side-menu-item url="users" icon="users" title="User"/>
    <x-side-menu-item url="payment-gateway-details" icon="money" title="Payment Gateway Detail"/>
    <x-side-menu-item url="category" icon="file" title="Category"/>
    <x-side-menu-item url="studios" icon="users" title="Studios"/>
    <x-side-menu-item url="pricing" icon="home" title="Pricing"/>
    <x-side-menu-item url="models" icon="users" title="Models"/>
    <!--    <x-side-menu-item url="gifts" icon="gifts" title="Gift" />
        <x-side-menu-item url="stickers" icon="ticket" title="Sticker" /> -->
    <x-side-menu-item url="pages" icon="file" title="Page"/>
    <x-side-menu-item url="interests" icon="thumbs-up" title="Inerest"/>
    <x-side-menu-item url="languages" icon="language" title="Language"/>
    <x-side-menu-item url="specifics" icon="home" title="Specifics"/>
    <x-side-menu-item url="subcultures" icon="home" title="Subculture"/>
    <x-side-menu-item url="term-of-use" icon="file" title="Term Of Use"/>

    <x-side-menu-item url="countries" icon="flag" title="Country"/>
    {{--        <x-side-menu-item url="states" icon="flag" title="State" />--}}
    {{--        <x-side-menu-item url="push-notifications" icon="bell" title="Push Notification" />--}}
    {{--        <x-side-menu-item url="official-messages" icon="comment" title="Official Message" />--}}
    {{--        <x-side-menu-item url="complaints" icon="comment" title="Complaints" />--}}
    {{--        <x-side-menu-item url="feedbacks" icon="comment" title="Feedback" />--}}
    {{--        <x-side-menu-item url="apk/create" icon="comment" title="APK" /> -->--}}
    {{-- @endrole --}}
</x-sidemenu>
