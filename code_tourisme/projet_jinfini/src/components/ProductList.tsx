import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Product } from '../types';

const ProductList: React.FC = () => {
  const [products, setProducts] = useState<Product[]>([]);

  useEffect(() => {
    axios.get<Product[]>('http://localhost:5000/getcakes')
      .then(response => {
        setProducts(response.data);
      })
      .catch(error => {
        console.error('There was an error fetching the products!', error);
      });
  }, []);

  return (
    <div>
      <h1>Products</h1>
      <div style={{ display: 'flex', flexWrap: 'wrap', justifyContent: 'space-between' }}>
        {products.map(product => (
          <div key={product.id} style={{ flexBasis: '30%', marginBottom: '20px', boxSizing: 'border-box' }}>
            <img src={`http://localhost:5000/${product.image}`} alt={product.cake_name} style={{ width: '300px', height: 'auto' }} />
            <p>{product.cake_name} - {product.price} €</p>
          </div>
        ))}
      </div>
    </div>
  );
};

export default ProductList;
