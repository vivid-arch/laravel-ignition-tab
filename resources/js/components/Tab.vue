<template>
    <div class="tab-content">
        <div class="layout-col">
            <div class="tab-content-section border-none">
                <h3 class="definition-list-title">Controller</h3>
                <dl class="definition-list">
                    <dt class="definition-label">Class</dt>
                    <dd class="definition-value">
                        <code class="code-inline">{{meta.instance.controller}}</code></code>
                    </dd>
                </dl>
            </div>
            
            <div class="tab-content-section">
                <h3 class="definition-list-title">Feature</h3>
                <dl class="definition-list">
                    <dt class="definition-label">Class</dt>
                    <dd class="definition-value">
                        <code class="code-inline">{{meta.instance.feature}}</code></code>
                    </dd>
                </dl>
            </div>
            
            <div class="tab-content-section">
                <h3 class="definition-list-title">Job Invocation List</h3>
                <dl class="definition-list" v-for="(job, i) in meta.instance.jobs">
                    <dt class="definition-label">[{{i}}]</dt>
                    <dd class="definition-value">
                        <code class="code-inline">{{job}}</code></code>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['meta'],

        mounted() {
            
        },
    }
</script>

<style>
    /* Scoped Styles */
</style>
