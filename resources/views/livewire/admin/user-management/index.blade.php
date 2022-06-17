<section class="content-wrapper">
    <section class="container">
        @if(session('delete'))
            <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                     role="alert">{{session('delete')}}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif
        @if(session('update'))
            <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                     role="alert">{{session('update')}}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif
        <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
            @forelse($Roles as $Role)
                <livewire:admin.user-management.user-box :myRole="$Role" :key="$Role->id">
            @empty
                <tr>
                    <td colspan="5">دیتا وجود ندارد</td>
                </tr>
            @endforelse
        </div>
    </section>
</section>
