((Vue, $) => {
	// Модель данных для окна
	class WindowModel {
		constructor({
			            frameType = 1,
			            name = 'Одностворчатое окно',
			            modifications = [4],
			            width = 1300,
			            height = 1460,
			            color = 'Белый',
			            accessories = [3]
		            } = {}) {
			this.frameType = frameType;
			this.name = name;
			this.modifications = modifications;
			this.width = width;
			this.height = height;
			this.color = color;
			this.accessories = accessories;
		}
	}

	const MODIFICATIONS_LIST = [
		{
			name: 'Откидная',
			value: 1
		},
		{
			name: 'Поворотно-откидная',
			value: 2
		},
		{
			name: 'Глухая',
			value: 3
		},
		{
			name: 'Поворотная',
			value: 4
		}
	];
	const COLORS_LIST = [
		{
			name: 'Белый',
			value: 'Белый'
		},
		{
			name: 'Ламинация',
			value: 'Ламинация'
		},
		{
			name: 'Покраска по RAL',
			value: 'Покраска по RAL'
		}
	];
	const ACCESSORIES_LIST = [
		{
			name: 'Подоконник',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/accessories/1.svg',
			value: 1
		},
		{
			name: 'Отливы',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/accessories/2.svg',
			value: 2
		},
		{
			name: 'Откосы',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/accessories/3.svg',
			value: 3
		},
		{
			name: 'Москитная сетка',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/accessories/4.svg',
			value: 4
		},
		{
			name: 'Детский замок',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/accessories/5.svg',
			value: 5
		}
	];
	const BUILDING_LIST = [
		{
			title: 'Квартира',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/buildingTypes/3.svg',
			value: 1
		},
		{
			title: 'Частный дом',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/buildingTypes/2.svg',
			value: 2
		},
		{
			title: 'Офисное здание',
			icon: '/wp-content/themes/success-dvwb/calculator/img/icons/buildingTypes/1.svg',
			value: 3
		}
	];
	const SUPPLEMENTS_LIST = [
		{
			title: 'Доставка',
			name: 'delivery',
			items: [
				{
					name: 'Не нужна',
					value: 1
				},
				{
					name: 'По Нижнему Новгороду',
					value: 2
				},
				{
					name: 'По Нижегородской области',
					value: 3
				}
			]
		},
		{
			title: 'Монтаж',
			name: 'mounting',
			items: [
				{
					name: 'Не нужен',
					value: 1
				},
				{
					name: 'Нужен с демонтажом',
					value: 2
				},
				{
					name: 'Нужен без демонтажа',
					value: 3
				}
			]
		},
		{
			title: 'Подъем',
			name: 'climb',
			items: [
				{
					name: 'Не нужен',
					value: 1
				},
				{
					name: 'Пассажирский лифт',
					value: 2
				},
				{
					name: 'Грузовой лифт',
					value: 3
				},
				{
					name: 'Лифта нет',
					value: 4
				}
			]
		}
	];
	const REQUIREMENTS_LIST = [
		{
			title: 'Шумоизоляция',
			name: 'noiseIsolation',
			description: 'Если окна выходят на автомагистраль или шумный двор, советуем выбирать максимум',
			tooltip: 'Относительная характеристика, показывающая способность окна уменьшать уровень шума, проникающего в помещение извне, вместе с соответствующим стеклопакетом',
			types: [
				{
					title: 'Минимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/1/1.svg',
					value: 1
				},
				{
					title: 'Стандарт',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/1/2.svg',
					value: 2
				},
				{
					title: 'Максимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/1/3.svg',
					value: 3
				},
			]
		},
		{
			title: 'Светопропускание',
			name: 'lightTransmission',
			description: 'Если вы хотите наполнить комнату большим светом или окна выходят на север, советуем выбирать максимум',
			tooltip: 'Доля естественного освещения, поступающего внутрь помещения через оконный проём, зависит прежде всего от высоты пакета профилей',
			types: [
				{
					title: 'Минимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/2/3.svg',
					value: 1
				},
				{
					title: 'Стандарт',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/2/2.svg',
					value: 2
				},
				{
					title: 'Максимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/2/1.svg',
					value: 3
				},
			]
		},
		{
			title: 'Взломостойкость',
			name: 'burglaryResistance',
			description: 'Жителям первых и последних этажей, а так же владельцам частной недвижимости, советуем выбирать максимум',
			tooltip: 'Устойчивость к проникновению через оконные конструкции при использовании с соответствующей фурнитурой',
			types: [
				{
					title: 'Минимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/3/1.svg',
					value: 1
				},
				{
					title: 'Стандарт',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/3/2.svg',
					value: 2
				},
				{
					title: 'Максимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/3/3.svg',
					value: 3
				},
			]
		},
		{
			title: 'Теплосбережение',
			name: 'heatSaving',
			description: 'Жителям угловых квартир, а так же владельцам домов с автономным отоплением, советуем выбирать максимум',
			tooltip: 'Относительная характеристика, определяющая теплопотери от окна вместе с соответствующим стеклопакетом',
			types: [
				{
					title: 'Минимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/4/3.svg',
					value: 1
				},
				{
					title: 'Стандарт',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/4/2.svg',
					value: 2
				},
				{
					title: 'Максимум',
					icon: '/wp-content/themes/success-dvwb/calculator/img/icons/requirementsTypes/4/1.svg',
					value: 3
				},
			]
		}
	];
	const FRAMES_LIST = [
		{
			name: 'Одностворчатое окно',
			icon: '#ico-frame-1',
			initialModifications: [
				4
			],
			value: 1
		},
		{
			name: 'Двухстворчатое окно',
			icon: '#ico-frame-2',
			initialModifications: [
				3,
				2
			],
			value: 2
		},
		{
			name: 'Трехстворчатое окно',
			icon: '#ico-frame-3',
			initialModifications: [
				3,
				2,
				3
			],
			value: 3
		},
		{
			name: 'Балконный блок двухстворчатый',
			icon: '#ico-frame-4',
			initialModifications: [
				2,
				3
			],
			value: 4
		},
		{
			name: 'Балконный блок одностворчатый',
			icon: '#ico-frame-5',
			initialModifications: [
				2
			],
			value: 5
		}
	];

	Vue.component('icons', {
		template: `
      <svg version="1.1" class="calculator-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1000 1000">
        <symbol id="ico-frame-1" viewBox="0 0 64 64">
          <path d="M19.5,12.5v39h25v-39H19.5z M41.5,48.5h-19v-33h19V48.5z"/>
          <rect x="28.5" y="23.7" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -8.6836 26.4953)" width="4" height="2"/>
          <rect x="25" y="21" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -7.2908 24.825)" width="8" height="2"/>
          <rect x="25.5" y="18.3" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -5.8979 23.1548)" width="4" height="2"/>
        </symbol>
        
        <symbol id="ico-frame-2" viewBox="0 0 64 64" >
          <path d="M33.5,12.5h-3h-22v39h22h3h22v-39H33.5z M30.5,48.5h-19v-33h19V48.5z M52.5,48.5h-19v-33h19V48.5z"/>
          <rect x="16.5" y="23.7" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -11.715 18.5225)" width="4" height="2"/>
          <rect x="13" y="21" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -10.3222 16.8523)" width="8" height="2"/>
          <rect x="13.5" y="18.3" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -8.9293 15.182)" width="4" height="2"/>
        </symbol>
        
        <symbol id="ico-frame-3" viewBox="0 0 64 64">
          <path d="M41.5,12.5h-3h-13h-3h-16v39h16h3h13h3h16v-39H41.5z M22.5,48.5h-13v-33h13V48.5z M38.5,48.5h-13v-33h13V48.5z M54.5,48.5h-13v-33h13V48.5z"/>
          <rect x="11" y="21" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -10.8274 15.5235)" width="8" height="2"/>
          <rect x="14.5" y="23.7" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -12.2203 17.1938)" width="4" height="2"/>
          <rect x="11.5" y="18.3" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -9.4346 13.8532)" width="4" height="2"/>
        </symbol>
        
        <symbol id="ico-frame-4" viewBox="0 0 64 64">
          <path d="M40.5,12.5h-3h-11h-3h-14v39h17v-12h11h3h14v-27H40.5z M23.5,48.5h-11v-33h11v24V48.5z M37.5,36.5h-11v-21h11 V36.5z M51.5,36.5h-11v-21h11V36.5z"/>
          <rect x="14.5" y="18.3" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -8.6767 15.8464)" width="4" height="2"/>
          <rect x="17.5" y="23.7" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -11.4624 19.1869)" width="4" height="2"/>
          <rect x="14" y="21" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -10.0696 17.5167)" width="8" height="2"/>
        </symbol>
        
        <symbol id="ico-frame-5" viewBox="0 0 64 64">
          <path d="M47.5,12.5h-14h-3h-14v39h17v-12h14V12.5z M30.5,48.5h-11v-33h11v24V48.5z M44.5,36.5h-11v-21h11V36.5z"/>
          <rect x="21.5" y="18.3" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -6.9084 20.4972)" width="4" height="2"/>
          <rect x="24.5" y="23.7" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -9.6941 23.8377)" width="4" height="2"/>
          <rect x="21" y="21" transform="matrix(0.7474 -0.6644 0.6644 0.7474 -8.3012 22.1674)" width="8" height="2"/>
        </symbol>
      </svg>
    `
	});
	Vue.component('v-button', {
		props: {
			title: {
				type: String,
				default: ''
			},
			center: {
				type: Boolean,
				defautl: false
			},
			loading: {
				type: Boolean,
				defautl: false
			}
		},
		methods: {
			onClick() {
				this.$emit('click')
			}
		},
		template: `
      <button 
        class="v-button"
        :class="{
          'v-button--loading': loading,
          'v-button--center': center
        }"
        @click="onClick"
      >
        {{ title }}
      </button>  
    `
	});

	Vue.component('tooltip', {
		props: {
			content: {
				type: String,
				default: ''
			}
		},
		template: `
      <div class="tooltip">
        <slot/>
        <div class="tooltip__content">
          <div class="tooltip__text">
            {{ content }}
          </div>
        </div>
      </div>
    `
	});

	Vue.component('v-select', {
		props: {
			value: {}
		},
		data: () => ({
			options: [],
			isOpen: false,
		}),
		computed: {
			selectOption() {
				if (this.value) {
					return this.options.length
						? this.options.find(option => option.value === this.value)
						: ''
				} else {
					return this.options.length
						? this.options[0]
						: ''
				}
			}
		},
		watch: {
			value() {
				this.onClose()
			}
		},
		mounted() {
			this.cachedOptions();
		},
		methods: {
			onToggle() {
				this.isOpen = !this.isOpen
			},
			onClose() {
				this.isOpen = false
			},
			cachedOptions() {
				this.options = this.getOptions()
			},
			getOptions() {
				return this.$children.map(options => {
					return {
						name: options.name,
						value: options.value
					}
				})
			}
		},
		template: `
      <div 
        class="v-select"
        :class="{
          'v-select--open': isOpen
        }"
      >
        <div 
          class="v-select__header" 
          @click="onToggle"
        >
          <div class="v-select__value">
            {{ selectOption.name }}
          </div>
        </div>
        
        <div class="v-select__dropdown">
          <ul class="list v-select__dropdown-menu">
            <slot/>
          </ul>
        </div>
      </div>
    `
	});
	Vue.component('v-option', {
		props: {
			name: {
				type: String,
				default: ''
			},
			value: [
				String,
				Number
			]
		},
		computed: {
			isActive() {
				return this.$parent.selectOption.value === this.value
			}
		},
		methods: {
			onClick() {
				this.$parent.$emit('input', this.value)
			}
		},
		template: `
      <li 
        class="v-option"
        :class="{
          'v-option--active': isActive
        }"
        @click="onClick"
      >
        {{ name }}
      </li>
    `
	});

	Vue.component('icon-button', {
		props: {
			title: {
				type: String,
				default: ''
			},
			icon: {
				type: String,
				default: ''
			},
			value: {}
		},
		computed: {
			isActive() {
				return this.$parent.value === this.value
			}
		},
		methods: {
			onClick() {
				this.$parent.$emit('input', this.value);
			}
		},
		template: `
      <button
        class="button-empty icon-button"
        :class="{
          'icon-button--active': isActive
        }" 
        @click="onClick"
      >
        <span class="icon-button__ico">
          <img 
            :src="icon" 
            :alt="title"
            class="icon-button__ico-img"
          >
        </span>
        
        <span class="icon-button__title">
          {{ title }}
        </span>
      </button>
    `
	});
	Vue.component('icon-buttons-group', {
		props: {
			value: {}
		},
		template: `
      <div class="icon-buttons-group">
        <slot/>
      </div>
    `
	});

	Vue.component('radio', {
		props: {
			name: {
				type: String,
				default: '',
			},
			value: {
				type: [
					Number,
					String
				],
				default: ''
			}
		},
		computed: {
			isActive() {
				return this.$parent.value === this.value
			}
		},
		methods: {
			onChange() {
				this.$parent.$emit('input', this.value);
			}
		},
		template: `
      <label 
        class="radio"
        :class="{
          'radio--active': isActive
        }" 
      >
        <input 
          type="radio" 
          class="radio__native" 
          :value="value" 
          :checked="isActive"
          @change="onChange"
        >
        <span class="radio__content">
          {{ name }}
        </span>
      </label>    
    `
	});
	Vue.component('radio-group', {
		props: {
			value: {}
		},
		template: `
      <div class="radio-group">
        <slot/>
      </div>    
    `
	});

	Vue.component('checkbox', {
		props: {
			name: {
				type: String,
				default: '',
			},
			value: {
				type: [
					Number,
					String
				],
				default: ''
			}
		},
		computed: {
			isActive() {
				return this.$parent.value.find(value => value === this.value);
			}
		},
		methods: {
			onChange() {
				const store = new Set(this.$parent.value);

				if (!store.has(this.value)) {
					store.add(this.value);
				} else {
					store.delete(this.value);
				}

				this.$parent.$emit('input', [...store]);
			}
		},
		template: `
      <label 
        class="checkbox"
        :class="{
          'checkbox--active': isActive
        }" 
      >
        <input 
          type="checkbox" 
          class="checkbox__native" 
          :value="value"
          :checked="isActive"
          @change="onChange"
        >
        <span class="checkbox__content">
          {{ name }}
        </span>
      </label>    
    `
	});
	Vue.component('checkbox-group', {
		props: {
			value: {}
		},
		template: `
      <div class="checkbox-group">
        <slot/>
      </div>    
    `
	});

	Vue.component('requirements', {
		props: {
			value: {}
		},
		data: () => ({
			requirements: REQUIREMENTS_LIST
		}),
		template: `
      <section class="requirements">
        <div 
          v-for="requirement in requirements"
          class="requirement"
        >
          <div class="row">
            <div class="col col-12 col-xl-6">
              <div class="requirement__title">
                {{ requirement.title }}
                
                <tooltip :content="requirement.tooltip">
                  <img src="/wp-content/themes/success-dvwb/calculator/img/icons/question.svg">
                </tooltip>
              </div>

              <div class="requirement__text">
                {{ requirement.description }}
              </div>
            </div>

            <div class="col col-12 col-xl-6">
              <icon-buttons-group v-model="value[requirement.name]">
                <icon-button 
                  v-for="button in requirement.types"
                  :title="button.title"
                  :icon="button.icon"
                  :value="button.value"
                />
              </icon-buttons-group>
            </div>
          </div>
        </div>
      </section>
    `
	});
	Vue.component('supplements', {
		props: {
			value: {}
		},
		data: () => ({
			supplements: SUPPLEMENTS_LIST
		}),
		methods: {
			onSubmit() {
				this.$emit('success');

			}
		},
		template: `
      <section class="supplements">
        <div class="container">
          <h2 class="calculator-page__title">Укажите какие дополнительные услуги вам нужны</h2>
          
          <div class="row">
            <div 
              v-for="supplement in supplements"
              class="col col-12 col-md-4"
            >
              <div class="supplement">
                <div class="supplement__header">
                  <div class="supplement__title">
                    {{ supplement.title }}:
                  </div>
                </div>
                
                <div class="supplement__body">
                  <radio-group v-model="value[supplement.name]">
                    <ul class="list supplement__list">
                      <li
                        v-for="item in supplement.items"
                        class="supplement__list-item"
                      >
                        <radio 
                          :name="item.name"
                          :value="item.value"
                        />
                      </li>
                    </ul>
                  </radio-group>
                </div>
              </div>
            </div>
          </div>
          
          <v-button 
            title="Рассчитать стоимость"
            :center="true"
            @click="onSubmit"
          />
        </div>
      </section>
    `
	});

	Vue.component('window', {
		props: {
			value: {},
			visibleButtons: {
				type: Boolean,
				default: true
			},
			openEditor: {
				type: Boolean,
				default: false
			},
			visibleEditor: {
				type: Boolean,
				default: true
			},
			index: {
				type: Number,
				default: 0
			}
		},
		data: () => ({
			isOpen: false
		}),
		watch: {
			openEditor: {
				immediate: true,
				handler(value) {
					this.isOpen = value;
				}
			}
		},
		computed: {
			currentTypeIcon() {
				return `#ico-frame-${this.value.frameType}`;
			},
			modificationsText() {
				return this.value.modifications.map(modification => {
					return MODIFICATIONS_LIST.find(item => item.value === modification).name;
				}).join(', ');
			},
			accessoriesText() {
				return this.value.accessories.map(accessory => {
					return ACCESSORIES_LIST.find(item => item.value === accessory).name;
				}).join(', ');
			}
		},
		methods: {
			onToggle() {
				if (!this.visibleEditor) {
					return;
				}

				this.isOpen = !this.isOpen;

				const index = this.isOpen ? this.index : null;

				this.$emit('onToggle', index);
			},
			onCopy() {
				this.$emit('onCopy', this.index);
			},
			onDelete() {
				this.$emit('onDelete', this.index);
			}
		},
		template: `
      
      <div
        class="window"
        :class="{
          'window--open': isOpen,
          'window--has-editor': visibleEditor
        }"
      >
        <div class="container">
          <div class="window__header">
            <div class="row align-items-center">
              <div 
                class="col col-auto"
                @click="onToggle"
              >
                <div class="row align-items-center no-gutters">
                  <div class="col">
                    <svg class="window__ico">
                      <use :xlink:href="currentTypeIcon"></use>
                    </svg>
                  </div>

                  <div class="col">
                    <div class="window__number">
                      Окно №{{ index + 1 }}
                    </div>

                    <div class="window__size">
                      {{ value.width }} х {{ value.height }}мм
                    </div>
                  </div>
                </div>
              </div>
              
              <div 
                class="col"
                @click="onToggle"
              >
                <div class="window__props">
                  {{ value.name }} 
                  ({{ modificationsText }}), 
                  {{ value.color }} цвет,
                  {{ accessoriesText }}
                </div>
              </div>
              
              <div
                v-if="visibleButtons" 
                class="col col-auto"
              >
                <div class="window__buttons">
                  <button 
                    class="button-empty window__button"
                    @click="onCopy"
                  >
                    <img 
                      src="/wp-content/themes/success-dvwb/calculator/img/icons/copy.svg" 
                      alt="Копировать окно"
                    >
                  </button>
                  
                  <button 
                    class="button-empty window__button"
                    @click="onDelete"
                  >
                    <img 
                      src="/wp-content/themes/success-dvwb/calculator/img/icons/delete.svg" 
                      alt="Удалить окно"
                    >
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div
          v-if="isOpen"
          class="window__body"
        >
          <editor v-model="value"/>
        </div>
      </div> 
      
    `
	});

	Vue.component('frame-1', {
		props: {
			value: {}
		},
		data: () => ({
			modifications: [
				MODIFICATIONS_LIST
			]
		}),
		template: `
      <div class="frame frame-1">
        <frame-select-modifications
          :modifications="modifications"
          v-model="value"
        />
        
        <div class="frame__wrap">
          <img src="/wp-content/themes/success-dvwb/calculator/img/frames/1.png" class="frame__image">
          
          <frame-modifications
            :frameIndex="1"
            :data="value"
          />
        </div>
      </div>
    `
	});
	Vue.component('frame-2', {
		props: {
			value: {}
		},
		data: () => ({
			modifications: [
				MODIFICATIONS_LIST,
				MODIFICATIONS_LIST
			]
		}),
		template: `
      <div class="frame">
        <frame-select-modifications
          :modifications="modifications"
          v-model="value"
        />
        
        <div class="frame__wrap">
          <img src="/wp-content/themes/success-dvwb/calculator/img/frames/2.png" class="frame__image">
          
          <frame-modifications
            :frameIndex="2"
            directionRight
            :data="value"
          />
        </div>
      </div>
    `
	});
	Vue.component('frame-3', {
		props: {
			value: {}
		},
		data: () => ({
			modifications: [
				MODIFICATIONS_LIST,
				MODIFICATIONS_LIST,
				MODIFICATIONS_LIST
			]
		}),
		template: `
      <div class="frame">
        <frame-select-modifications
          :modifications="modifications"
          v-model="value"
        />
        
        <div class="frame__wrap">
          <img src="/wp-content/themes/success-dvwb/calculator/img/frames/3.png" class="frame__image">
          
          <frame-modifications
            :frameIndex="3"
            directionRight
            :data="value"
          />
        </div>
      </div>
    `
	});
	Vue.component('frame-4', {
		props: {
			value: {}
		},
		data: () => ({
			modifications: [
				MODIFICATIONS_LIST,
				MODIFICATIONS_LIST
			]
		}),
		template: `
      <div class="frame">
        <frame-select-modifications
          :modifications="modifications"
          v-model="value"
        />
        
        <div class="frame__wrap">
          <img src="/wp-content/themes/success-dvwb/calculator/img/frames/4.png" class="frame__image">
          
          <frame-modifications
            :frameIndex="4"
            directionRight
            :data="value"
          />
        </div>
      </div>
    `
	});
	Vue.component('frame-5', {
		props: {
			value: {}
		},
		data: () => ({
			modifications: [
				MODIFICATIONS_LIST
			]
		}),
		template: `
      <div class="frame">
        <frame-select-modifications
          :modifications="modifications"
          v-model="value"
        />
        
        <div class="frame__wrap">
          <img src="/wp-content/themes/success-dvwb/calculator/img/frames/5.png" class="frame__image">
          
          <div class="frame__wrap-modifications">
            <frame-modifications
            :frameIndex="5"
            :data="value"
          />
          </div>
        </div>
      </div>
    `
	});
	Vue.component('frame-select-modifications', {
		props: {
			value: {},
			modifications: {
				type: Array,
				default: () => []
			}
		},
		template: `
      <div class="frame-select-modifications">
        <div class="row align-items-center justify-content-center">
          <div 
            v-for="(modification, index) in modifications"
            class="col-12 col-md-4"
          >
            <v-select 
              v-model="value[index]"
              :class="{
                'is-last': index === 2
              }"
            >
              <v-option 
                v-for="item in modification"
                :name="item.name"
                :value="item.value"
              />
            </v-select>
          </div>
        </div>
      </div>
    `
	});
	Vue.component('frame-modifications', {
		props: {
			data: {
				type: Array,
				default: () => []
			},
			frameIndex: {
				type: Number,
				default: 0
			},
			directionRight: {
				type: Boolean,
				default: false
			}
		},
		computed: {
			modificationSrc() {
				return (value, index) => {
					return (this.directionRight && index === 0)
						? this.modificationRightSrc(value)
						: this.modificationLeftSrc(value)
				}
			},
			modificationLeftSrc() {
				return value => `/wp-content/themes/success-dvwb/calculator/img/modifications/left/${value}.png`
			},
			modificationRightSrc() {
				return value => `/wp-content/themes/success-dvwb/calculator/img/modifications/right/${value}.png`
			},
			modificationClass() {
				return (modificationIndex) => `frame-${this.frameIndex}-m-${modificationIndex + 1}`
			}
		},
		template: `
      <div class="frame__wrap-modifications">
        <img
          v-for="(modification, index) in data" 
          v-if="data[index] !== 3"
          :src="modificationSrc(modification, index)"
          :class="[modificationClass(index)]"
          class="frame-modification"
        >
      </div>
    `
	});

	Vue.component('editor', {
		props: {
			value: {},
		},
		template: `
      <section class="editor">
        <div class="container">
          <h2 class="calculator-page__title">Укажите размер, конфигурацию и цвет ваших будущих окон</h2>
          
          <div class="row">
            <div class="col-12 col-xl-auto">
              <editor-frames v-model="value.frameType"/>
            </div>
            
            <div class="col-xl col-12 col-lg-8">            
              <editor-canvas v-model="value"/>
            </div>
            
            <div class="col-12 col-xl-auto col-lg-4">
              <editor-filter v-model="value"/>
            </div>
          </div>
        </div>
      </section>
    `
	});
	Vue.component('editor-frames', {
		props: {
			value: {}
		},
		data: () => ({
			frames: FRAMES_LIST,
		}),
		methods: {
			onClick(frame) {
				this.$emit('input', frame.value);
				this.$root.$emit('onChangeFrame', frame)
			}
		},
		template: `
      <aside class="editor-frames">
        <ul class="list editor-frames__list">
          <li
            v-for="frame in frames"
            class="editor-frames__list-item"
          >
            <button 
              class="button-empty editor-frames__list-button"
              :class="{
                'editor-frames__list-button--active': value === frame.value
              }"
              @click="onClick(frame)"
            >
              <svg>
                <use :xlink:href="frame.icon"></use>
              </svg>
            </button>
          </li>
        </ul>
      </aside> 
    `
	});
	Vue.component('editor-filter', {
		props: {
			value: {},
		},
		data: () => ({
			accessories: ACCESSORIES_LIST,
			colors: COLORS_LIST
		}),
		template: `
      <aside class="editor-filter">
        <div class="editor-filter__group">
          <div class="editor-filter__props">
            <div class="editor-filter__props-group">
              <div class="row">
                <div class="col col-6">
                  <div class="editor-filter__prop">
                    <div class="editor-filter__prop-name">Ширина, мм</div>
  
                    <input type="number" class="field" v-model.number="value.width">
                  </div>
                </div>
  
                <div class="col col-6">
                  <div class="editor-filter__prop">
                    <div class="editor-filter__prop-name">Высота, мм</div>
  
                    <input type="number" class="field" v-model.number="value.height">
                  </div>
                </div>
              </div>
            </div>
             
            <div class="editor-filter__props-group">
              <div class="editor-filter__prop">
                <div class="editor-filter__prop-name">Цвет профиля</div>
  
                <v-select v-model="value.color">
                  <v-option
                    v-for="color in colors"
                    :name="color.name"
                    :value="color.value"
                  />
                </v-select>
              </div>
            </div>
          </div>
        </div>  

        <div class="editor-filter__group">
          <div class="editor-filter__accessories">
            <div class="editor-filter__accessories-header">
              <div class="editor-filter__accessories-title">Аксессуары:</div>
            </div>
          
            <div class="editor-filter__accessories-body">
              <checkbox-group v-model="value.accessories">
                <ul class="list accessories-list">
                  <li
                    v-for="item in accessories"
                    class="accessories-list__item"
                  >
                    <div class="row align-items-center">
                      <div class="col">
                        <checkbox 
                          :name="item.name"
                          :value="item.value"
                        />
                      </div>
    
                      <div class="col col-auto">
                        <img 
                          :src="item.icon" 
                          :alt="item.name"
                        >
                      </div>
                    </div>
                  </li>
                </ul>
              </checkbox-group>
            </div>
          </div>
        </div>  
      </aside> 
    `
	});
	Vue.component('editor-canvas', {
		props: {
			value: {},
		},
		computed: {
			currentFrame() {
				switch (this.value.frameType) {
					case 1:
						return 'frame-1';
					case 2:
						return 'frame-2';
					case 3:
						return 'frame-3';
					case 4:
						return 'frame-4';
					case 5:
						return 'frame-5';
					default:
						return 'frame-1';
				}
			}
		},
		template: `
      <section class="editor-canvas">
        <component 
          :is="currentFrame" 
          v-model="value.modifications"
        />
      
        <div class="editor-canvas__size editor-canvas__size--x">
          <input 
            type="number" 
            v-model.number="value.width"
          > 
          <span>мм</span>
        </div>
        
        <div class="editor-canvas__size editor-canvas__size--y">
          <input 
            type="number" 
            v-model.number="value.height"
          >
          <span>мм</span>
        </div>
      </section> 
    `
	});

	Vue.component('result', {
		props: {
			data: {
				type: Object,
				default: () => ({})
			}
		},
		data: () => ({

			isLoading: false,
			tel: '',
			customer_name: '',
			hash: '',
			supplements: SUPPLEMENTS_LIST
		}),
		computed: {
			supplementName() {

				return (value, index) => this.supplements[index].items.find(supplement => supplement.value === value).name

			}
		},

		mounted() {

			this.hash = this.uuidv4();

		},
		methods: {

			onSubmit() {

				let re = /^[\+\d\(\)\ -]{9,17}\d$/;
				let myPhone = $('#telefon').val();
				let valid = re.test(myPhone);
				let i = myPhone.length - myPhone.replace(/\d/gm, '').length;
				let num = parseInt(myPhone.replace(/\D+/g, ""));
				let sNumber = num.toString();
				let num1 = 1;
				let num2 = 2;
				let povtor = 0;
				if (myPhone.charAt(0) == 7 || myPhone.charAt(0) == 8 || myPhone.charAt(0) == "+" && myPhone.charAt(1) == 7) {
					if (valid) {
						if (i == 11) {
							while (sNumber.charAt(num1) == sNumber.charAt(num2)) {
								num1++;
								num2++;
								povtor++;
							}
							if (povtor != 9) {
								const {data, tel, customer_name, hash} = this;

								const model = {
									...data,
									tel,
									customer_name,
									hash
								};
								$('#result').html('Отправлено!');
								$.ajax({
									type: 'POST',
									url: '/wp-admin/admin-ajax.php?action=send_form_calc',
									data: {
										model: JSON.stringify(model)
									},
									dataType: 'json'
								})
									.done(result => {
										const {status} = result;

										if (status) {
											this.$emit('onSuccess');

											$.dialog({
													title: '',
													content: '<div style="padding: 30px"><h1 style="color: white; text-align: center; font-weight: normal;"><strong>Спасибо</strong></h1><h2 style="color: white; text-align: center; font-weight: normal;">Ваш расчёт отправлен! Дожидайтесь звонка от менеджера.</h2></div>',
													// boxWidth: '30%',
													useBootstrap: false,
													// type: 'green',

												}
											);
											dataLayer.push({'event': 'GAEvent', 'eventCategory': 'form', 'eventAction': 'success', 'eventLabel': 'calculator'});
										} else {
											$.dialog({
												title: 'Ошибка!',
												content: 'Не удалось отправить расчёт. Попробуйте выполнить действие позже.',
												// type: 'red',
												buttons: {
													// yes: {
													//   text: 'Закрыть',
													//   btnClass: 'btn-red'
													// }
												}
											});
										}
									});
							} else $('#result').html('Введите, пожалуйста, правильный номер телефона.<br>Например: +7 923 232 32 78');
						} else {
							$('#result').html('В телефоне должно быть 11 цифр.<br>Например: +7 923 232 32 78');
						}
					} else {
						$('#result').html('Введите, пожалуйста, правильный номер телефона.<br>Например: +7 923 232 32 78');
					}
				} else {
					$('#result').html('Телефон должен начинаться с +7 или 8 или 7.<br>Например: +7 923 232 32 78');
				}
			},
			uuidv4() {
				return 'xxxxxx-4xxxx'.replace(/[xy]/g, (c) => {
					const random = Math.random() * 16 | 0;
					const v = c == 'x' ? random : (random & 0x3 | 0x8);
					//this.onInitTelMask();
					return v.toString(16);
				});
			}
		},
		template: `
      <section class="result">
        <div class="container">
          <h2 class="calculator-page__title">Ваш набор окон и услуг</h2>
          
          <window 
            v-for="(window, index) in data.windows"
            :index="index"
            :visibleEditor="false"
            :visibleButtons="false"
            v-model="data.windows[index]"
          />
           
          <div class="result__info">
            <div class="row">
              <div class="col-12 col-lg-7">
                <table class="result-table">
                  <tbody>
                    <tr v-for="(supplement, index) in supplements">
                      <th>{{ supplement.title }}</th>
                      <td>{{ supplementName(data.supplements[supplement.name], index) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
  
              <div class="col-12 col-lg-5">
                <div class="calculation">
                  <div class="calculation__title">Ваш расчет:</div>
                  <div class="calculation__hash">{{ hash }}</div>
                  
                  <div class="calculation__text">
                    По Вашему запросу возможны несколько вариантов.
                    Консультант перезвонит для конкретизации расчета.
                  </div>
                  <input
                    ref="customer_name"
                    type="text" 
                    class="field"
                    v-model="customer_name"
                    id="customer_name"
                    placeholder="Имя"
                    maxlength="20"
                  >

                  <input
                    ref="tel"
                    type="tel" 
                    class="field"
                    v-model="tel"
                    id="telefon"
                    placeholder="Номер телефона"
                    maxlength="20" 
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 32
                    || event.key === "+" || event.key === "(" || event.key === ")" || event.key === "-"'
                  >
                  <div id="result" style="position: relative; bottom: 10px; text-align: center; color: red;">
                 </div>
                  <div id="result" style="position: relative; bottom: 10px; text-align: center; color: red;">
                 </div>
                  
                  <v-button 
                    title="Рассчитать стоимость"
                    :center="true"
                    :loading="isLoading"
                    @click="onSubmit"
                  />
                  
                  <div class="calculation__sub-text">
                    Нажимая расчитать стоимость вы соглашаетесь<br>
                    на <a href="#">обработку персональных данных</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    `
	});

	const app = new Vue({
		el: '#app',
		data: () => ({
			resultVisible: false,
			buildingTypes: BUILDING_LIST,
			currentWindowIndex: 0,
			model: {
				// Выбранное здание
				building: 1,
				// Выбранные требования
				requirements: {
					noiseIsolation: 1,
					lightTransmission: 1,
					burglaryResistance: 1,
					heatSaving: 1
				},
				// Набор созданных в редакторе окон
				windows: [
					new WindowModel()
				],
				// Выбранные дополнения к заказу
				supplements: {
					delivery: 2,
					mounting: 1,
					climb: 3
				}
			}
		}),
		mounted() {
			this.$on('onChangeFrame', ({name, initialModifications}) => {
				this.model.windows[this.currentWindowIndex].name = name;
				this.model.windows[this.currentWindowIndex].modifications = initialModifications;
			});
		},

		methods: {
			// Добавление окна
			onAddWindow() {
				const window = new WindowModel();
				this.model.windows.push(window);
			},

			onToggleWindow(value) {
				this.currentWindowIndex = value;
			},

			// Удаление окна
			onDeleteWindow(index) {
				this.model.windows.splice(index, 1);
			},

			// Копирование окна
			onCopyWindow(currentIndex) {
				const window = this.model.windows.find((window, index) => index === currentIndex);

				const clone = new WindowModel({
					...window
				});

				this.model.windows.push(clone);
			},

			onShowResult() {
				this.resultVisible = true;
			},

			onSuccess() {
				this.resultVisible = false;
			}
		},
		template: `
      <div>
        <div class="container">
          <div class="building-types">
            <div class="row">
              <div class="col col-12 col-xl-6">
                <icon-buttons-group v-model="model.building">
                  <icon-button 
                    v-for="button in buildingTypes"
                    :title="button.title"
                    :icon="button.icon"
                    :value="button.value"
                  />
                </icon-buttons-group>
              </div>
            </div>
          </div>
          
          <requirements v-model="model.requirements"/>
        </div>
        
        <window 
          v-for="(window, index) in model.windows"
          @onDelete="onDeleteWindow"
          @onCopy="onCopyWindow"
          @onToggle="onToggleWindow"
          :openEditor="true"
          :index="index"
          v-model="model.windows[index]"
        />
        
        <div class="container">
          <button 
            class="button-empty button-add-window"
            @click="onAddWindow"
            
          >
            <img src="/wp-content/themes/success-dvwb/calculator/img/icons/plus.svg">
            Добавить новое окно
          </button>
        </div>
        
        <supplements
          v-model="model.supplements"
          @success="onShowResult"
        />
        
        <result 
          v-if="resultVisible"
          :data="model"
          @onSuccess="onSuccess"
        />
        
        <icons/>
      </div>
    `
	});
})(Vue, jQuery);
let scrollToWindows = 0;
$('.calculator-page >  div:nth-child(2)').addClass('roll');
$('.button-empty.button-add-window').click(function (){
	$lenght = $('.calculator-page .window').length;
	// $('.window.window--has-editor .window__body').hide();
	if (scrollToWindows === 0){
		$('html,body').animate({ scrollTop: $('.calculator-page').offset().top + 1250 }, 0);
		scrollToWindows = 1;
	}
	$('.calculator-page .roll .window:nth-child('+$lenght+') .window__body').hide();
	$('.calculator-page .roll .window:nth-child('+$lenght+')').removeClass('window--open');
	$('.calculator-page .roll .window:nth-child('+($lenght+1)+')').addClass('window--open');
})