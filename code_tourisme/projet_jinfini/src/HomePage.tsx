import React, { FunctionComponent } from 'react';
import styles from './HomePage.module.css';
import homeIcon from './logo/Home.png'; 
import phoneIcon from './logo/Phone.png'; 
import menuIcon from './logo/Menu.png'; 


const HomePage: FunctionComponent = () => {
    return (
        <div className={styles.homepage}>
            <div className={styles.header}>
                <div className={styles.jinfiniParis}>Jinfini Paris</div>
                <img className={styles.homeIcon} alt="home" src={homeIcon} />
                <img className={styles.phoneIcon} alt="phone" src={phoneIcon}/>
                <img className={styles.menuIcon} alt="menu" src={menuIcon} />
            </div>
            <div className={styles.body}>
                <div className={styles.centreCommercialDe}>Centre commercial de pâtisserie en ligne Jinfini</div>
            </div>
        </div>
    );
};

export default HomePage;
