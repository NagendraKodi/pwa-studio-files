module.exports = targets => {
  targets.of("@magento/venia-ui").routes.tap(routes => {
    routes.push(
      {
      name: "MyGreetingRoute",
      pattern: "/greeting/:who?",
      path: require.resolve("../components/GreetingPage/greetingPage.js")
    },
    {
      name: "DemoGraphQl",
      pattern: "/demo-graphql/:id?",
      path: require.resolve("../components/DemoGraphQl/demoGraphQl.js")
    }
    );
    return routes;
  });
};