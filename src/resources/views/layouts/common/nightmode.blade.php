<div class="dropdown bd-mode-toggle" wire:ignore x-data="nightModeSelector()">
    <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (dark)">
      <i class="bi bd-mode-icon me-2" :class="getIcon()"></i> <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text" style="">
      <template x-for="(mode, index) in modes" :key="index" >
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" @click="setMode(index)" :data-bs-theme-value="index" aria-pressed="false" :class="{'active':index==theme}" >
            <i class="bi me-2 bd-mode-icon" :class="mode.icon"></i> <span x-text="mode.label"></span>
          </button>
        </li>
      </template>
    </ul>
  </div>