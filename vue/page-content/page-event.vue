<template>
    <div class="event-container">
        <div class="event-top-wrapper">
            <div class="event-image-container">
                <div class="event-image-wrapper">
                    <img class="event-image" :src="event.getImage($language)" />
                </div>
                <div class="event-table">
                    <div class="event-table-row">
                        <div
                            class="event-table-title"
                            v-html="event.get('event_type_title', $language)"
                        ></div>
                        <div
                            class="event-table-item"
                            v-html="event.get('event_type', $language)"
                        ></div>
                    </div>
                    <div class="event-table-row">
                        <div
                            class="event-table-title"
                            v-html="event.get('event_start_title', $language)"
                        ></div>
                        <div
                            class="event-table-item"
                            v-html="event.get('event_start', $language)"
                        ></div>
                    </div>
                    <div class="event-table-row">
                        <div
                            class="event-table-title"
                            v-html="
                                event.get('event_duration_title', $language)
                            "
                        ></div>
                        <div
                            class="event-table-item"
                            v-html="event.get('event_duration', $language)"
                        ></div>
                    </div>
                    <div class="event-table-row">
                        <div
                            class="event-table-title"
                            v-html="
                                event.get('event_timeuntil_title', $language)
                            "
                        ></div>
                        <div
                            class="event-table-item"
                            v-html="event.get('event_timeuntil', $language)"
                        ></div>
                    </div>
                </div>
            </div>
            <div class="event-title-wrapper">
                <div
                    class="event-title"
                    v-html="event.get('event_title', $language)"
                ></div>
                <div
                    class="event-subtitle"
                    v-html="event.get('event_subtitle', $language)"
                ></div>
                <div class="event-separator"></div>
                <div
                    class="event-description"
                    v-html="event.get('event_description', $language)"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "page-event",
    data: function () {
        return {};
    },
    created() {},
    props: ["event"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/page-event.css";
</style>