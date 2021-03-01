<template>
    <div class="tab-content">
        <div class="layout-col">
            <div class="tab-content-section border-none">
                <h3 class="definition-list-title">Controller</h3>
                <dl class="definition-list">
                    <dt class="definition-label">Class</dt>
                    <dd class="definition-value">
                        <FilePath
                            :file="meta.instance.controller_path"
                            :lineNumber="'1'"
                            :editable="true"
                        ></FilePath>
                    </dd>
                </dl>
            </div>

            <div class="tab-content-section">
                <h3 class="definition-list-title">Feature</h3>
                <dl class="definition-list">
                    <dt class="definition-label">Class</dt>
                    <dd class="definition-value">
                        <FilePath
                            :file="meta.instance.feature_path"
                            :lineNumber="'1'"
                            :editable="true"
                        ></FilePath>
                    </dd>
                </dl>
            </div>

            <div class="tab-content-section">
                <h3 class="definition-list-title">Job Invocation List</h3>
                <dl class="definition-list" v-for="(job, i) in meta.instance.jobs">
                    <dt class="definition-label">[{{i+1}}]</dt>
                    <dd class="definition-value">
                        <job :single="job"></job>
                    </dd>
                </dl>
            </div>

            <div class="tab-content-section">
                <p class="credits">Powered by <a class="link" href="https://vivid-arch.github.io/" target="_blank">Vivid</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    import Job from './Job.vue'
    import FilePath from "./FilePath"

    export default {
        props: ['meta'],
        components: {
            Job,
            FilePath
        }
    }
</script>

<style>
    .credits {
        text-align: center;
        color: rgb(209, 204, 224);
    }
    .link {
        text-decoration: underline;
        cursor: pointer;
    }
</style>
