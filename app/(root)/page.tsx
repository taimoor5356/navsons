import HeaderBox from '@/components/HeaderBox'
import RightSidebar from '@/components/RightSidebar';
import TotalBalanceBox from '@/components/TotalBalancebox';
import { getLoggedInUser } from '@/lib/actions/user.actions';
import React from 'react'
import { redirect } from "next/navigation";

const Home = async () => {
    // const loggedIn = {firstName: 'John', lastName: 'JSM', email: 'john@gmail.com'};
    const loggedIn = await getLoggedInUser();
    if (!loggedIn || loggedIn instanceof Error) {
      redirect('/sign-in');
    }
    
  return (
    <section className='home'>
      <div className='home-content'>
        <header className='home-header'>
            <HeaderBox
             type="greeting" 
             title="Welcome" 
             user={loggedIn?.name || 'Guest'} 
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
