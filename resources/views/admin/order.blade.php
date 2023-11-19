<div class="table-responsive">
    <table class="table-list">
        <thead>
            <tr>
                <th class="w-10 text-center">
                    <input class="form-checkbox actionsAllChecked" type="checkbox" @change="actions('all')" value="1">
                </th>

                <th>
                    <div class="flex items-baseline gap-x-1">
                        ID

                        <a href="http://127.0.0.1:8000/moonshine/resource/coupon-resource?order%5Bfield%5D=id&amp;order%5Btype%5D=asc"
                            class="shrink-0" @click.prevent="canBeAsync">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" fill-opacity=".5"
                                    d="m11.47,4.72a0.75,0.75 0 0 1 1.06,0l3.75,3.75a0.75,0.75 0 0 1 -1.06,1.06l-3.22,-3.22l-3.22,3.22a0.75,0.75 0 0 1 -1.06,-1.06l3.75,-3.75z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" fill-opacity=".5"
                                    d="m12.53,4.72zm-4.81,9.75a0.75,0.75 0 0 1 1.06,0l3.22,3.22l3.22,-3.22a0.75,0.75 0 1 1 1.06,1.06l-3.75,3.75a0.75,0.75 0 0 1 -1.06,0l-3.75,-3.75a0.75,0.75 0 0 1 0,-1.06z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </th>
                <th>
                    <div class="flex items-baseline gap-x-1">
                        ID User
                    </div>
                </th>
                <th>
                    <div class="flex items-baseline gap-x-1">
                        Total Price
                    </div>
                </th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="bgc-default" style="">
                    <td class="w-10 text-center bgc-default" style="">
                        <input class="form-checkbox tableActionRow" type="checkbox" @change="actions('row')"
                            name="items[1]" value="1">
                    </td>

                    <td class="bgc-default" style="">
                        <span class="badge badge-purple">
                            {{ $order->id }}
                        </span>

                    </td>
                    <td class="bgc-default" style="">
                        {{ $order->user_id }}
                    </td>
                    <td class="bgc-default" style="">
                        {{ $order->total_price }}
                    </td>

                    <td class="bgc-default" style="">
                        <div class="flex items-center justify-end gap-2">
                            <a class="btn btn-primary"
                                href="http://127.0.0.1:8000/moonshine/custom_page/order/{{ $order->id }}">
                                Xác nhận
                            </a>

                            <div x-data="modal()">
                                <template x-teleport="body">
                                    <div class="modal-template">
                                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 -translate-y-10"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100 translate-y-0"
                                            x-transition:leave-end="opacity-0 -translate-y-10" class="modal"
                                            aria-modal="true" role="dialog" @click.self="open=false">
                                            <div class="modal-dialog " x-bind="dismissModal">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Deleting</h5>
                                                        <button type="button" class="btn btn-close"
                                                            @click.stop="open=false" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" aria-hidden="true"
                                                                class="fill-current w-6 h-6  ">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-4">
                                                            Are you sure?
                                                        </div>

                                                        <form class="form" method="POST"
                                                            action="http://127.0.0.1:8000/moonshine/resource/coupon-resource/1">
                                                            <input type="hidden" name="_token"
                                                                value="CA5ZOm7kBUgzMcPhJ8S2cNYr1Y7AqHYjrqERliQ1"
                                                                autocomplete="off">
                                                            <input type="hidden" name="_method" value="delete">

                                                            <button type="submit" class="btn btn-primary btn-pink">
                                                                Confirm
                                                            </button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div x-show="open" x-transition.opacity="" class="modal-backdrop"></div>
                                    </div>
                                </template>

                                <a class="btn btn-pink" @click.prevent="toggleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="text-current w-4 h-4  ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                        </path>
                                    </svg>


                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot x-ref="foot" :class="actionsOpen ? 'translate-y-none ease-out' : '-translate-y-full ease-in hidden'"
            class="-translate-y-full ease-in hidden">
            <tr>
                <td colspan="5">
                    <div class="flex items-center gap-4">
                        <div x-data="modal()">
                            <template x-teleport="body">
                                <div class="modal-template">
                                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 -translate-y-10"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 -translate-y-10" class="modal"
                                        aria-modal="true" role="dialog" @click.self="open=false">
                                        <div class="modal-dialog " x-bind="dismissModal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Deleting</h5>
                                                    <button type="button" class="btn btn-close"
                                                        @click.stop="open=false" aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" aria-hidden="true"
                                                            class="fill-current w-6 h-6  ">
                                                            <path fill-rule="evenodd"
                                                                d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-4">
                                                        Are you sure?
                                                    </div>

                                                    <form class="form" method="POST"
                                                        action="http://127.0.0.1:8000/moonshine/resource/coupon-resource/massDelete">
                                                        <input type="hidden" name="_token"
                                                            value="CA5ZOm7kBUgzMcPhJ8S2cNYr1Y7AqHYjrqERliQ1"
                                                            autocomplete="off">
                                                        <input type="hidden" name="_method" value="delete">

                                                        <input class="form-input actionsCheckedIds" type="hidden"
                                                            name="ids" value="">

                                                        <button type="submit" class="btn btn-primary btn-pink">
                                                            Confirm
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="open" x-transition.opacity="" class="modal-backdrop"></div>
                                </div>
                            </template>

                            <a class="btn btn-pink" @click.prevent="toggleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="text-current w-4 h-4  ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                    </path>
                                </svg>


                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
