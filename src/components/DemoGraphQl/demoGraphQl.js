/* src/components/DemoGraphQl/demoGraphQl.js */

import React from "react";
import { useParams } from "react-router";
import { useQuery } from '@apollo/client';

import GET_ORDERS from './queries/salesOrder.graphql';


const DemoGraphQl = props => {

const { data } = useQuery(GET_ORDERS);

console.log(data);

const design = {
  textAlign: "center",
  margin: "1rem"
};

const wave = {
  ...design,
  fontSize: "5rem"
};

const orderDetails = Object.entries(data).map(([key,value])=>{
  return (
    <div style={design}>
        <h1 style={wave}>{"\uD83D\uDC4B"}</h1>
        <strong>{key} Increment ID: </strong>{value.increment_id} <br/>        
    </div>
  );
})

return (
  <div>
    {orderDetails} <br/>
    <div style={design}>
      <strong>Customer Name: </strong>     {data.salesOrder.customer_name}     <br/>
      <strong>grand_total: </strong>       {data.salesOrder.grand_total}       <br/>
    </div>    
  </div>
);

};

export default DemoGraphQl;