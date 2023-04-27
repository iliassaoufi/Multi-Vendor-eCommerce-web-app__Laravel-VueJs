import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/Stores/:id",
    name: "Stores",

    component: () => import("../views/Stores.vue"),
  },
  {
    path: "/about",
    name: "About",

    component: () => import("../views/About.vue"),
  },
  {
    path: "/Contact",
    name: "Contact",

    component: () => import("../views/Contact.vue"),
  },
  {
    path: "/Product/:id",
    name: "Product",

    component: () => import("../views/Product.vue"),
  },
  {
    path: "/Products",
    name: "Products",

    component: () => import("../views/Products.vue"),
  },
  {
    path: "/Store/:id",
    name: "Store",

    component: () => import("../views/Store.vue"),
  },
  {
    path: "/Checkout",
    name: "Checkout",
    component: () => import("../views/Checkout.vue"),
  },
  {
    path: "/Login/:id",
    name: "Login",
    component: () => import("../views/Login.vue"),
  },
  {
    path: "/Vendor",
    name: "Vendor",
    component: () => import("../views/Vendor.vue"),
  },
  {
    path: "/User",
    name: "User",
    component: () => import("../views/User.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
