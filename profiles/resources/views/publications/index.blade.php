<x-master title="publications">
    <h3>Publications</h3>
    <div class="container w-50 mx-auto">
        <div class="row my-5">
            @foreach ($publications as $publication)
                <x-publication :publication="$publication"/>
            @endforeach
        </div>
    </div>
    {{ $publications->links() }}
</x-master>




