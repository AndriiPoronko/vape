<template>
    <div class="v-catalog">
        <div class="v-catalog__head">
            <div class="v-catalog__head-select">
                <v-select :options="CATEGORIES" @select="optionSelect" :selected="selected" />
            </div>
            <div class="v-catalog__head-select">
                <v-select :options="sort" @select="optionSelectPrice" :selected="selectedPrice" />
            </div>
        </div>
        <div class="v-catalog__block">
            <v-catalog-item
                v-for="product in filteredProducts"
                :key="product.id"
                :product_data="product"
                @addToCart="addToCart"
                @modalProduct="modalProduct"
            />

            <div class="v-catalog-item empty"></div>
            <div class="v-catalog-item empty"></div>
            <div class="v-catalog-item empty"></div>
            <div class="v-catalog-item empty"></div>
        </div>
    </div>

</template>

<script>
import vCatalogItem from "./v-catalog-item";
import { mapActions, mapGetters } from "vuex";
import vSelect from "../v-select";

export default {
    name: "v-catalog",
    components: { vCatalogItem, vSelect },
    data() {
        return {
            selected: "Категории",
            selectedPrice: "Сортировать по цене",
            sortedProduct: [],
            sort: [
                { title: "От дорогих к дешевым", value: "top" },
                { title: "От дешевых к дорогим", value: "low" },
            ],
        };
    },
    methods: {
        ...mapActions([
            "GET_PRODUCTS_FROM_API",
            "ADD_TO_CART",
            "ACTIVE_MODAL_PRODUCT",
            "GET_CATEGORIES_FROM_API",
        ]),
        addToCart(data) {
            this.ADD_TO_CART(data);
        },
        modalProduct(product) {
            this.ACTIVE_MODAL_PRODUCT(product);
        },
        optionSelect(option) {
            this.sortedProduct = [];
            let vm = this;
            this.PRODUCTS.map(function (item) {
                if (item.category_id === option.id) {
                    vm.sortedProduct.push(item);
                }
            });

            this.selected = option.title;
            this.selectedPrice = "Сортировать по цене";
        },
        optionSelectPrice(optionPrice) {
            this.selectedPrice = optionPrice.title;
            let vm = this;
            if (!this.sortedProduct.length) {
                this.sortedProduct = [...this.PRODUCTS];
            }

            this.sortedProduct.sort((a, b) => {
                if (optionPrice.value === "low") {
                    return a.price - b.price;
                } else if (optionPrice.value === "top") {
                    return b.price - a.price;
                } else {
                    return vm.sortedProduct;
                }
            });
        },
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
        this.GET_CATEGORIES_FROM_API();
    },
    computed: {
        ...mapGetters(["PRODUCTS", "CATEGORIES"]),
        filteredProducts() {
            if (this.sortedProduct.length) {
                return this.sortedProduct;
            } else {
                return this.PRODUCTS;
            }
        },
    },
};
</script>

<style lang="scss">
.v-catalog {
    padding: 75px 15px;
    min-height: 100vh;
    margin: 0 auto;
    max-width: 1370px;

    &__head {
        width: 100%;
        background-color: #000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px;
    }

    &__block {
        display: flex;
        padding: 50px 0;
        justify-content: space-between;
        flex-wrap: wrap;
        margin: 0 -5px;
    }
}
.load {
    width: 100%;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}
</style>

