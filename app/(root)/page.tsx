import HeaderBox from '@/components/HeaderBox'
import RightSidebar from '@/components/RightSidebar';
import TotalBalanceBox from '@/components/TotalBalancebox';
import React from 'react'

const Home = () => {
    const loggedIn = {firstName: 'John', lastName: 'JSM', email: 'john@gmail.com'};
  return (
    <section className='home'>
      <div className='home-content'>
        <header className='home-header'>
            <HeaderBox
             type="greeting" 
             title="Welcome" 
             user={loggedIn?.firstName || 'Guest'} 
             subtext="Access and manage account and transactions efficiently"
             />

             <TotalBalanceBox
              accounts={[]} 
              totalBanks={1} 
              totalCurrentBalance={1250.35} 
              />
        </header>
        Recent transaction
      </div>
      <RightSidebar
        user={loggedIn} 
        transactions={[]} 
        banks={[{currentBalance: 123.44}, {currentBalance: 500.00}]} 
      />
    </section>
  )
}

export default Home
