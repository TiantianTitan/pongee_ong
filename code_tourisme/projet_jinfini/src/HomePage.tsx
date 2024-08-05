import React, { FunctionComponent,useEffect, useState } from 'react';
import axios from 'axios';
import ProductList from 'components/ProductList';
import styles from './HomePage.module.css';
import homeIcon from './logo/Home.png'; 
import phoneIcon from './logo/Phone.png'; 
import menuIcon from './logo/Menu.png'; 
import logo from "./logo/jinfini.png"
import bg_video from './video/show1.mp4';
import bg_video2 from './video/show3.mp4';

interface Product {
    id: number;
    name: string;
    price: number;
  }

const HomePage:  React.FC = () => {
    const [products, setProducts] = useState<Product[]>([]);
  
    useEffect(() => {
      axios.get<Product[]>('http://your-backend-server-url/getproducts')
        .then((response: { data: Product[] }) => {
          setProducts(response.data);
        })
        .catch((error: any) => {
          console.error('There was an error fetching the products!', error);
        });
    }, []);
  
    return (
        <div className={styles.homepage}>
            <div className={styles.header}>
                <div className={styles.jinfiniParis}>Jinfini Paris</div>
                <img className={styles.homeIcon} alt="home" src={homeIcon} />
                <img className={styles.phoneIcon} alt="phone" src={phoneIcon}/>
                <img className={styles.menuIcon} alt="menu" src={menuIcon} />
            </div>
            <div className={styles.body}>
                <div className={styles.videoContainer}>
                    <div className={styles.bg_text}>Centre commercial de pâtisserie en ligne Jinfini</div>
                    <video className={styles.bg_video} src={bg_video} autoPlay loop muted />
                    <img className={styles.jinfiniLogo} alt="logo" src={logo} />
                    <video className={styles.bg_video2} src={bg_video2} autoPlay loop muted/>
                    <div className={styles.bg_text2}>                Choose what you want, do what you love.</div>
                </div>
                
                <div className={styles.products}>
                    <ProductList />
                 </div>
            </div>

           
        </div>

    );
};

export default HomePage;
