# insly-app

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### To acess
```
http://localhost:8080/
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

# insly-app

This front application uses the Vue.Js. Which is a component-based frontend framework, which allows the reuse of components and logic. The Axios library was used to mediate front access to the REST api.

The Front is composed of a SPA (Single Page Application) that uses routes for navigability. Taks 2, referring to the calculation form, accesses the BackEnd api which was responsible for all calculations and business logic (good practice). And everything is rendered in the SPA.
The front pro back access route is located in the api.js file.
The Task2.vue component represents the calculator screen and uses the other components for its construction and logic. Within this file it is worth mentioning the use of axios to perform the post method in the API Rest.

Task 3 has a route just for viewing the MER. A construction was proposed based on the main existing Database practices, use of foreign keys and relationships. Mer helps to visualize how this construction went.