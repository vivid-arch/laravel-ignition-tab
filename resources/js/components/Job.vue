<template>
    <div>
        <FilePath
            :file="single.fqn_path"
            :lineNumber="'1'"
            :editable="true"
        ></FilePath>
        <a class="link" v-on:click="isHidden = !isHidden">
            <span v-if="isHidden">Show more</span>
            <span v-if="!isHidden">Show less</span>
        </a>

        <div class="more" v-if="!isHidden">
            Time Started: {{single.time}} (microtime)
            <div class="viewer">
                <json-viewer
                    :value=JSON.parse(single.json)
                    :expand-depth=5
                    copyable
                    boxed
                    sort>
                </json-viewer>
            </div>
        </div>
    </div>
</template>

<script>
    import JsonViewer from 'vue-json-viewer/ssr'
    import FilePath from "./FilePath"
    import 'vue-json-viewer/style.css'

    export default {
        props: ['single'],
        data() {
            return {
                isHidden: true
            }
        },
        components: {
            JsonViewer,
            FilePath
        },
        mounted() {

        },
    }
</script>

<style>
    .viewer {
        margin-top: 10px;
    }
    .more {
        margin-top: 15px;
    }
</style>
