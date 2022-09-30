<template>
    <div class="container-fluid contact-wrapper">
        <div class="contact-box d2">
            <div
                class="form-title"
                v-html="form.get('subtitle', $language)"
            ></div>
            <div class="form-row">
                <div
                    class="form-heading"
                    v-html="form.get('name', $language)"
                ></div>
                <input
                    v-model="name"
                    type="text"
                    :placeholder="name_placeholder"
                    :style="name_error"
                    class="form-input"
                />
            </div>
            <div class="form-row">
                <div
                    class="form-heading"
                    v-html="form.get('mail', $language)"
                ></div>
                <input
                    v-model="mail"
                    type="email"
                    :placeholder="mail_placeholder"
                    :style="mail_error"
                    class="form-input"
                />
            </div>
            <div class="form-row-text">
                <div
                    class="form-heading"
                    v-html="form.get('message', $language)"
                ></div>
                <textarea
                    class="message-text"
                    v-model="text"
                    :style="text_error"
                ></textarea>
            </div>
            <div class="form-row-button">
                <div class="form-response">{{ status }}</div>
                <div
                    class="form-button d1"
                    :class="error"
                    @click="submit()"
                    v-html="form.get('button', $language)"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "page-contact",
    data: function () {
        return {
            name_placeholder: "Alex Muster",
            name: "",
            name_error: "",
            mail_placeholder: "alex@muster.de",
            mail: "",
            mail_error: "",
            text: "",
            text_error: "",
            status: "",
            error: "",
        };
    },
    created() {
        this.emitter.on(
            "contact-response",
            (e) => (this.status = e.get("status", this.$language))
        );
    },
    props: ["form"],
    mounted() {},
    methods: {
        submit() {
            var data = {
                name: this.name,
                mail: this.mail,
                message: this.text,
            };

            this.name_error = "";
            this.message_error = "";
            this.text_error = "";

            if (this.name === "") {
                this.name_error = { border: "1px solid red" };
            }
            if (this.text === "") {
                this.text_error = { border: "1px solid red" };
            }
            if (this.mail === "") {
                this.mail_error = { border: "1px solid red" };
            }

            if (this.name === "" || this.text === "" || this.mail === "") {
                this.error = "animate__animated animate__headShake";

                setTimeout((q) => {
                    this.error = "";
                }, 500);
                return;
            }

            this.emitter.emit("contact", data);
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/page-contact.css";
</style>